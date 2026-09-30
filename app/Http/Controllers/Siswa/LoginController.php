<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/portal/dashboard');
        }
        return view('siswa.login');
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

        if (Auth::guard('siswa')->attempt($data)) {
            return redirect('/portal/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect()->route('login.siswa')
                ->with('error', 'Login Gagal! Username atau Password yang Anda masukkan salah');
        }
    }

    public function actionLogout()
    {
        Auth::guard('siswa')->logout();
        return redirect()->route('login.siswa')->with('success', 'Anda Berhasil Logout');
    }
}
