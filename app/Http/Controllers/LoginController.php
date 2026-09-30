<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('petugas')->check()) {
            return redirect('/dashboard');
        }
        return view('petugas.login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('petugas')->attempt($data)) {
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect('/login')->with('error', 'Login Gagal! Username atau Password yang Anda masukkan salah');
        }
    }

    public function actionLogout()
    {
        Auth::guard('petugas')->logout();
        return redirect('/login')->with('success', 'Anda Berhasil Logout');
    }
}
