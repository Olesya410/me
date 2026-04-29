@extends('layouts.app')

@section('title', $listing->title)

@section('content')
<div class="wrapper">
    <div class="container my-5">

        <!-- Заголовок и основные данные -->
        <h1 class="mb-4">{{ $listing->title }}</h1>

        <!-- Фото слайдер -->
        @if($listing->photos->isNotEmpty())
        <div id="photosCarousel" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @foreach($listing->photos as $index => $photo)
                <div class="carousel-item @if($index == 0) active @endif">
                    <img src="{{ asset('storage/' . $photo->url) }}" 
                        class="d-block mx-auto" 
                        style="width: 1000px; height: 700px; object-fit: cover;"
                        alt="Фото {{ $index + 1 }}">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#photosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Назад</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#photosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Вперёд</span>
            </button>
        </div>
        @else
            <img src="/storage/no_photo_new.jpg" alt="Нет фото" />
        @endif

        <!-- Описание квартиры -->
        <div class="mb-4">
            <h3 style="color: #000;">Описание</h3>
            <p style="white-space: pre-wrap;">{{ $listing->description_full ?? $listing->description }}</p>
        </div>

        <!-- Основные характеристики -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h3 style="color: #000;">Основные характеристики</h3>
                <div class="row">
                    <div>
                        <strong>Площадь:</strong> {{ $listing->area ?? 'не указано' }} м²
                    </div>
                    <div>
                        <strong>Гостей:</strong> {{ $listing->guests ?? 'не указано' }}
                    </div>
                    <div>
                        <strong>Комнат:</strong> {{ $listing->bedrooms ?? 'не указано' }}
                    </div>
                </div>
            </div>

            <!-- Расположение -->
            <div class="col-md-6">
                <h3 style="color: #000;">Расположение</h3>
                <p>{{ $listing->location_address }}</p>
                @if($listing->location_nearby)
                <p><strong>Близко:</strong> {{ $listing->location_nearby }}</p>
                @endif
                @if($listing->location_details)
                <p><strong>Детали:</strong> {{ $listing->location_details }}</p>
                @endif
            </div>
        </div>

        <!-- Цена и доступность -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h4 style="color: #000;">Цена за ночь</h4>
                <p>{{ number_format($listing->price_per_night, 0, ',', ' ') }} ₽</p>
            </div>
            <div class="col-md-6">
                <h4 style="color: #000;">Доступность</h4>
                <p>С {{ $listing->available_from }} по {{ $listing->available_to }}</p>
            </div>
        </div>

        <!-- Правила дома -->
        @if($listing->house_rules)
        <div class="mb-4">
            <h4 style="color: #000;">Правила дома</h4>
            <p>{{ $listing->house_rules }}</p>
        </div>
        @endif

        <div class="row mb-4">
            <h3 style="color:#000;">Есть в квартире</h3>
            @foreach($listing->features as $feature)
                <p>{{ $feature->feature_name }}</p>
            @endforeach
        </div>

        <!-- Отзывы о жилье -->
        @include('listings.review')

        <!-- Данные арендодателя -->
        <div class="owner-info mt-5 p-3 border rounded">
            <h3>Арендодатель</h3>
            <p><strong>Имя:</strong> {{ $listing->owner->name }}</p>
            <p><strong>Почта:</strong> {{ $listing->owner->email }}</p>
            <p><strong>Телефон:</strong> {{ $listing->owner->phone ?? 'не указано' }}</p>
        </div>

        <!-- Отзывы о арендодателе -->
        @include('listings.hostreview')
    </div>
</div>
@endsection