<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function loginRetrofit(LoginRequest $request)
    {
        // 1. Find the user by email
        $user = User::where('email', $request->email)->first();
    
        if ($user && Auth::attempt($request->only('email', 'password'))) {
            // 2. Successful authentication 
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token' => $token, 
                'email' => $user->email,
                'userId' => $user->id,
            ], 200); 
        } else {
            // Invalid credentials (or user not found)
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401); 
        }
    }
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
