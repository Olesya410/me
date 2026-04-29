<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|string',
            'number' => 'required|string|max:12',
            'role_id' => 'require|integer',
        ], [
            'name.required' => 'Пожалуйста, введите ваше имя.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'email.required' => 'Пожалуйста, введите email.',
            'email.email' => 'Пожалуйста, введите корректный email.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'password.required' => 'Пожалуйста, введите пароль.',
            'password.min' => 'Пароль должен содержать не менее 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
            'role_id.required' => 'Не указана роль.',
            'role_id.integer' => 'Некорректный формат роли.',
        ]);

        $genders = [
            'male' => 'Мужской',
            'female' => 'Женский',
        ];

        $gender_ru = $genders[$request->gender] ?? '';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $gender_ru,
            'number' => $request->number,
            'role_id' => 1,
        ]);

        return redirect()->route('register.form')->with('success', 'Вы успешно зарегистрировались!');
    }
}