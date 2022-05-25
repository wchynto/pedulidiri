<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login', [
            'nama' => 'login',
        ]);
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            return redirect('/home');
        } else {

            return redirect('/')->with('danger', 'NIK atau Password tidak terdaftar');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
