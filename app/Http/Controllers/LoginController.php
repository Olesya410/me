<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm() {
        return view('login'); // ваш шаблон авторизации
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role_id == 2) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/profile');
        }

        return back()->withErrors([
            'email' => 'Неправильные данные.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/login'); 
    }

}