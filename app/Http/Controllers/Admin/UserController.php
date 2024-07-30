<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
        public function index()
    {
        return view('admin.users.index');
    }

        public function edit(User $user)
    {
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }


    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return view('admin.users.index');
    }

    
}
