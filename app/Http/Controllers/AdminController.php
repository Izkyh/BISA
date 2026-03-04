<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Batasi hanya user admin yang bisa login
        if ($credentials['email'] !== 'admin@tibasurabaya.com') {
            return back()->withErrors(['email' => 'Hanya admin yang bisa login']);
        }
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
