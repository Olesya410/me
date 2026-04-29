@extends('layouts.app')
@section('title', 'Авторизация')


@section('content')
<div class="wrapper" style="flex: 1; display: flex;flex-direction: column;">
    <div class="auto-regist">
        <div class="form-box">
            <div class="form-title">Авторизация</div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Введите email" required />

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" placeholder="Введите пароль" required />

                <button type="submit"><i>Войти</i></button>
                <a href="{{ route('register.form') }}">Регистрация</a>
            </form>
        </div>
    </div>
</div>
@endsection