<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost:8080/login', [
            'username' => $request->username,
            'password' => $request->password
        ]);

        if ($response->successful()) {
            Session::put('user', $response->json());
            return redirect('/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }

    public function logout()
    {
        Http::get('http://localhost:8080/logout');
        Session::forget('user');
        return redirect('/login');
    }
}

