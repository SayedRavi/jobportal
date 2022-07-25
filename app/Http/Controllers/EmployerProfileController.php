<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerProfileController extends Controller
{

    public function store()
    {

        $user = User::create([
            'email' => \request()['email'],
            'user_type' => \request()['user_type'],
            'password' => Hash::make(\request('password')),
        ]);
        Company::create([
            'user_id' => $user->id,
            'cname' => \request('cname'),
            'slug' => \request('cname')
        ]);
        return redirect()->to('login')
            ->withSuccess('Email Must be Verified to Continue');
    }
}
