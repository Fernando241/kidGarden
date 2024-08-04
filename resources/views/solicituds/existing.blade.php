@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="card">
    <br>
    <h3 class="text-primary"><strong class="text-blue">Jardín Infantil Genios Del Saber</strong></h3>
    <h5>Bienvenid@:  {{ auth()->user()->name }}!</h5><br>
</div>

@section('content')
    <div class="text-right">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver</a>
    </div>
    <br>
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Solicitud en Proceso</h4>
        <p>Estimado(a) {{ auth()->user()->name }}:</p>
        <p>
            Nos complace informarle que su solicitud de cupo para el jardín infantil ha sido recibida y está actualmente en proceso de revisión. 
            Nuestro equipo está trabajando diligentemente para evaluar todas las solicitudes y garantizar que cada niño reciba la mejor atención posible.
        </p>
        <p>
            Le agradecemos su paciencia y comprensión durante este periodo. Nos pondremos en contacto con usted para informarle sobre el estado de su solicitud 
            y los próximos pasos a seguir.
        </p>
        <p>
            Si tiene alguna pregunta o necesita más información, no dude en comunicarse con nosotros a través de los medios que hemos dispuesto para ti en la página principal.
        </p>
        <hr>
        <p class="mb-0">Atentamente,</p>
        <p class="mb-0"><strong>Jardín Infantil Genios Del Saber</strong></p>
    </div>
@endsection