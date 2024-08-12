<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function createpaypal()
    {
        return view('pagos.index');
    }

    public function processPaypal(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('processSuccess'),
                'cancel_url' => route('processCancel'),
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => 10.00,
                    ],
                ],
            ]
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()
                ->route('createpaypal')
                ->with('error', 'Algo salio mal.');
            }else {
                return redirect()
                    ->route('createpaypal')
                    ->with('error', $response['message'] ?? 'Algo salio mal.');
            }
        }

    public function processSuccess(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('createpaypal')
                ->with('success', 'Transacción completada con éxito.');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Algo salio mal.');
        }
    }

    public function processCancel(Request $request)
    {
        return redirect()
            ->route('createpaypal')
            ->with('error', $response['message'] ?? 'Usted Cancelo la transacción.');
    }
}
