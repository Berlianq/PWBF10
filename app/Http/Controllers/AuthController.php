<?php

namespace App\Http\Controllers;

use App\Helpers\LogLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login', [
            "title" => "Halaman Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            if (auth()->user()->role === 'admin')
                return redirect()->route('dashboard.index')->with('success', 'Login berhasil dilakukan.');

            return redirect()->route('home.index')->with('success', 'Login berhasil dilakukan.');
        }

        return back()
            ->withInput(['email'])
            ->with('failed', 'Gagal dalam melakukan percobaan login, Silahkan coba lagi!');
    }

    public function register()
    {
        return view('register', [
            "title" => "Daftarkan Akun Anda"
        ]);
    }

    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => "required",
            'email' => "required|email|unique:users",
            "password" => "required|min:5|confirmed",
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => "user",
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('auth.login')->with('success', 'Akun berhasil didaftarkan, silahkan login!');
    }


    public function logout()
    {
        auth()->logout();

        request()->session()->regenerate();
        request()->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Anda berhasil keluar.');
    }
}
