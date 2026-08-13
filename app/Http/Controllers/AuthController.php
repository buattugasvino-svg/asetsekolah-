<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman / form login
     */
    public function showLoginForm()
    {
        return view('login'); // Sesuai nama file Blade Anda (login.blade.php)
    }

    /**
     * Memproses autentikasi akun pengguna
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form login
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        // 2. Coba proses login dengan kredensial yang dimasukkan
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Regenerasi session untuk keamanan (mencegah Session Fixation attack)
            $request->session()->regenerate();

            // Arahkan ke dashboard jika berhasil
            return redirect()->intended(route('dashboard'));
        }

        // 3. Jika login gagal (Email/Password salah)
        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Memproses keluar / logout pengguna
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidasi session & buat ulang CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman login
        return redirect()->route('login');
    }
}