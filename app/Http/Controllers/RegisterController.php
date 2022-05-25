<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'nama' => 'register'
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'sekolah' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user =  new User;
        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->sekolah = $request->sekolah;
        $user->email = $request->email;
        $user->foto = '';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/register')->with('success', 'Berhasil menambahkan akun');
    }
}
