<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showAdminLoginForm  ()
    {
        return view('login-admin');
    }

    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
         // Check if email exists in users table first
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Email not found
            return back()->withErrors([
                'email' => 'This email is not registered.',
            ]);
        }

        $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
        if (auth()->user()->role !== 'admin') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'You are not allowed to login from here.',
            ]);
        }

            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

    }
    
}
?>