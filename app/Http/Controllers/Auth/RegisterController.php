<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $user= User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        ]);
    }
}
