@extends('layouts.app')
@section('title', 'Регистрация')

@section('content')
    <div class="wrapper">
        <div class="auto-regist">
            <div class="form-box">
                <div class="form-title">Регистрация</div>

                {{-- Вывод сообщений об успехе --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Вывод ошибок --}}
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Введите email" required />

                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" placeholder="Введите имя" required />

                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required />

                    <label for="repeat_password">Повторите пароль</label>
                    {{-- Исправляем имя поля на password_confirmation для правил подтверждения --}}
                    <input type="password" id="repeat_password" name="password_confirmation" placeholder="Повторите пароль" required />

                    <label for="gender">Пол</label>
                    <select name="gender" id="gender" required><br><br>
                        <option value="male" {{ (isset($user) && $user->gender == 'Мужской') ? 'selected' : '' }}>Мужской</option>
                        <option value="female" {{ (isset($user) && $user->gender == 'Женский') ? 'selected' : '' }}>Женский</option>
                    </select>
                    <br>
                    <lable for="number">Номер телефона</lable>
                    <input type="number" id="number" name="number" placeholder="Номер телефона" required><br><br>

                    <button type="submit"><i>Регистрация</></button>
                    <a href="{{ route('login') }}">Авторизация</a>
                </form>
            </div>
        </div>
    </div>
@endsection