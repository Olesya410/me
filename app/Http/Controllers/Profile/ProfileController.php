<?php
namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Валидация полей, которые могут обновляться
        $rules = [
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
            'name' => 'nullable|string|max:25',
            'email' => 'nullable|email|max:32',
        ];

        $request->validate($rules);

        $user = Auth::user();

        // Обновляем только те поля, которые пришли и не пустые
        $data = [];

        if ($request->filled('name')) {
            $data['name'] = $request->input('name');
        }

        if ($request->filled('email')) {
            $data['email'] = $request->input('email');
        }

        if ($request->filled('phone')) {
            $data['phone'] = $request->input('phone');
        }

        if ($request->filled('gender')) {
            $genders = [
                'male' => 'Мужской',
                'female' => 'Женский',
            ];
            $gender_ru = $genders[$request->input('gender')];
            $data['gender'] = $gender_ru;
        }

        // Обновляем пользователя, если есть изменения
        if (!empty($data)) {
            $user->update($data);
        }

        return redirect('/profile')->with('success', 'Профиль обновлен');
    }
}