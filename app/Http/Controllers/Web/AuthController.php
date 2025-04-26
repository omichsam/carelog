<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.index');
    }

    public function authenticate(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }
            return redirect()->back()->withInput()->with('error', 'The provided credentials do not match our records.');

        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function logout(Request $request)
    {
        //Invalidate the user's session data.
        // This is crucial to remove all data tied to the old session.
        $guard = Auth::guard('web');
        $guard->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out');
    }

}