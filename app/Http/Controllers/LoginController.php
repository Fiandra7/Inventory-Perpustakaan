<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // true = login tetap diingat tanpa checkbox "Ingat saya"
        if (Auth::attempt($credentials, true)) {

            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput($request->only('email'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user, true);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function googleLogin(Request $request)
{
    $request->validate([
        'credential' => 'required|string',
    ]);

    try {

        $client = new \Google_Client([
            'client_id' => config('services.google.client_id'),
        ]);

        $payload = $client->verifyIdToken(
            $request->credential
        );

        if (!$payload) {
            return response()->json([
                'success' => false,
                'message' => 'Token Google tidak valid.'
            ], 401);
        }

        if (
            empty($payload['email']) ||
            empty($payload['sub'])
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Data akun Google tidak lengkap.'
            ], 422);
        }

        if (
            isset($payload['email_verified']) &&
            !$payload['email_verified']
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Email Google belum terverifikasi.'
            ], 422);
        }

        $email = $payload['email'];
        $name = $payload['name'] ?? 'Pengguna Google';

        $user = User::where('email', $email)->first();

        if (!$user) {

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make(
                    \Illuminate\Support\Str::random(40)
                ),
            ]);
        }

        Auth::login($user, true);

        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'redirect' => route('dashboard'),
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'success' => false,
            'message' => 'Login dengan Google gagal.'
        ], 401);
    }
}
}