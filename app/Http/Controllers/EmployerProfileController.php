<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerProfileController extends Controller
{

    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'email' => 'required | email | string | max:255 | unique:users',
            'user_type' => 'required',
            'password' => 'required | string | min:8 | confirmed',
//            'password-confirm' =>  'required | same:password',
            'name' => 'required | alpha | min:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_type' => $request->user_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
         Company::create([
            'user_id' => $user->id,
            'cname' => $request->name,
            'slug' => $request->name
        ]);

        return redirect()->to('login')
            ->withSuccess('Email Must be Verified to Continue');
    }
}
