@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Заполните свой профиль</h2>
    <form action="{{ route('profile.update') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Пол</label>
            <select name="gender" id="gender" class="form-select" required>
                <option value="male" {{ $user->gender == 'Мужской' ? 'selected' : '' }}>Мужской</option>
                <option value="female" {{ $user->gender == 'Женский' ? 'selected' : '' }}>Женский</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection