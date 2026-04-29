@extends('layouts.app')

@section('title', 'Мой профиль')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Общие стили для страницы профиля */
    .profile-card {
        max-width: 800px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    /* Заголовок профиля */
    .profile-header {
        background-color: #12215f;
        color: #fff;
        padding: 30px 20px;
        text-align: center;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .profile-header h1 {
        margin: 0;
        font-weight: bold;
        font-size: 2rem;
    }
    /* Основной блок */
    .profile-body {
        padding: 30px 20px;
        text-align: center;
    }

    /* Информация о пользователе */
    .user-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
        max-width: 600px;
        margin: 0 auto;
        text-align: left;
    }

    /* Иконки и текст */
    .user-info .d-flex {
        align-items: center;
    }

    /* Кнопки */
    .action-buttons {
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    .btn-custom {
        background-color: #12215f;
        color: #fff;
        transition: background-color 0.3s;
    }

    .btn-custom:hover {
        background-color: #0f1b4b;
    }

    /* Мобильная адаптация */
    @media(max-width: 768px) {
        .user-info {
            padding: 0 10px;
        }
        .action-buttons {
            flex-direction: column;
            align-items: center;
        }
        .btn-custom {
            width: 100%;
            max-width: 250px;
        }
    }
</style>

<div class="container my-5 d-flex justify-content-center">
    <div class="profile-card">
        <div class="profile-header">
            <h1>Мой профиль</h1>
        </div>
        <div class="profile-body">
            <div class="user-info">
                <div class="d-flex">
                    <i class="bi bi-person text-primary me-3 fs-4"></i>
                    <div>
                        <span class="fw-medium">Имя пользователя</span>
                        <p class="mb-0 text-muted">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="bi bi-envelope text-success me-3 fs-4"></i>
                    <div>
                        <span class="fw-medium">Email</span>
                        <p class="mb-0 text-muted">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="bi bi-envelope text-success me-3 fs-4"></i>
                    <div>
                        <span class="fw-medium">Номер телефона</span>
                        <p class="mb-0 text-muted">{{ $user->number }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="bi bi-calendar-check text-info me-3 fs-4"></i>
                    <div>
                        <span class="fw-medium">Дата регистрации</span>
                        <p class="mb-0 text-muted">{{ $user->created_at->format('d.m.Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- <h3>Объявлений: {{ $countListings ?? 0 }}</h3>

            @if(isset($listings) && $listings->isEmpty())
                <p>У вас пока нет объявлений.</p>
            @else
                <ul>
                    @foreach($listings as $listing)
                        <li>
                            <strong>{{ $listing->title }}</strong><br>
                            {{ $listing->description }}<br>
                            Цена за ночь: {{ $listing->price_per_night }}<br>
                            Адрес: {{ $listing->location_address }}<br>
                            Даты: {{ $listing->available_from }} - {{ $listing->available_to }}
                        </li>
                    @endforeach
                </ul>
            @endif --}}

            <!-- Действия -->
            <div class="action-buttons">
                <a href="{{ route('profile.edit') }}" class="btn btn-custom btn-lg px-4 me-2 mb-2">
                    <i class="bi bi-pencil me-2">Редактировать профиль</i>
                </a>
                <a href="{{ route('listings.photocreate') }}" class="btn btn-custom btn-lg px-4 me-2 mb-2">
                    <i class="bi bi-calendar me-2">Сдать квартиру</i>
                </a>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-lg px-4 mb-2" style="background-color: #12215f; color: #fff; border: none; cursor: pointer;">
                    <i class="bi bi-box-arrow-right me-2">Выход</i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection