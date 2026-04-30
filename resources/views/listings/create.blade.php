@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Редактировать объявление</h1>
    <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="row g-3 bg-light p-4 rounded shadow">
        @csrf
        @method('PUT')

        <!-- Поля формы с предварительно заполненными значениями -->

        <div class="col-md-6">
            <label for="title" class="form-label">Заголовок объявления</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $listing->title) }}" required>
        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">Краткое описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $listing->description) }}</textarea>
        </div>

        <div class="col-12">
            <label for="description_full" class="form-label">Полное описание</label>
            <textarea class="form-control" id="description_full" name="description_full" rows="4" required>{{ old('description_full', $listing->description_full) }}</textarea>
        </div>

        <div class="col-md-4">
            <label for="area" class="form-label">Площадь (м²)</label>
            <input type="number" class="form-control" id="area" name="area" value="{{ old('area', $listing->area) }}" required>
        </div>

        <div class="col-md-4">
            <label for="guests" class="form-label">Количество гостей</label>
            <input type="number" class="form-control" id="guests" name="guests" value="{{ old('guests', $listing->guests) }}" required>
        </div>

        <div class="col-md-4">
            <label for="bedrooms" class="form-label">Количество спален</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $listing->bedrooms) }}" required>
        </div>

        <div class="col-12">
            <label for="location_address" class="form-label">Адрес</label>
            <input type="text" class="form-control" id="location_address" name="location_address" value="{{ old('location_address', $listing->location_address) }}" required>
        </div>

        <div class="col-md-6">
            <label for="location_nearby" class="form-label">Рядом</label>
            <input type="text" class="form-control" id="location_nearby" name="location_nearby" value="{{ old('location_nearby', $listing->location_nearby) }}">
        </div>

        <div class="col-md-6">
            <label for="location_details" class="form-label">Детали местоположения</label>
            <textarea class="form-control" id="location_details" name="location_details" rows="2">{{ old('location_details', $listing->location_details) }}</textarea>
        </div>

        <div class="col-md-4">
            <label for="price_per_night" class="form-label">Цена за ночь</label>
            <input type="number" class="form-control" id="price_per_night" name="price_per_night" value="{{ old('price_per_night', $listing->price_per_night) }}" required>
        </div>

        <div class="col-md-4">
            <label for="check_in_time" class="form-label">Время заезда</label>
            <input type="time" class="form-control" id="check_in_time" name="check_in_time" value="{{ old('check_in_time', $listing->check_in_time) }}">
        </div>

        <div class="col-md-4">
            <label for="check_out_time" class="form-label">Время выезда</label>
            <input type="time" class="form-control" id="check_out_time" name="check_out_time" value="{{ old('check_out_time', $listing->check_out_time) }}">
        </div>

        <div class="col-md-4">
            <label for="deposit" class="form-label">Залог</label>
            <input type="number" class="form-control" id="deposit" name="deposit" value="{{ old('deposit', $listing->deposit) }}">
        </div>
        
        <div class="col-12">
            <label for="house_rules" class="form-label">Правила дома</label>
            <textarea class="form-control" id="house_rules" name="house_rules" rows="3">{{ old('house_rules', $listing->house_rules) }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="available_from" class="form-label">Доступно с</label>
            <input type="date" class="form-control" id="available_from" name="available_from" value="{{ old('available_from', $listing->available_from ? $listing->available_from->format('Y-m-d') : '') }}" required>
        </div>

        <div class="col-md-6">
            <label for="available_to" class="form-label">Доступно до</label>
            <input type="date" class="form-control" id="available_to" name="available_to" value="{{ old('available_to', $listing->available_to ? $listing->available_to->format('Y-m-d') : '') }}" required>
        </div>

        <!-- ВСТАВКА скрытых полей с фото -->
        @if(session('photos_ids'))
            @foreach(session('photos_ids') as $photoId)
                <input type="hidden" name="photos_id[]" value="{{ $photoId }}">
            @endforeach
        @endif

        <!-- Кнопка отправки -->
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Обновить объявление</button>
        </div>
    </form>
</div>
@endsection