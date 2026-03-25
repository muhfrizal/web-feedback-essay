<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip'      => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'nip' => $request->nip,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // langsung ke soal nomor 1
            return redirect()->route('soal', 1);
        }

        return back()->withErrors([
            'nip' => 'NIP atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('formlogin');
    }
}