{{-- @extends('layouts.app')

@section('content')
<div class="wrapper">
    <h1>Редактировать квартиру</h1>

    <form action="{{ route('listings.update', $listing->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ $listing->title }}" required>
        </div>
        <div class="mb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control" required>{{ $listing->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Площадь</label>
            <input type="number" name="area" class="form-control" value="{{ $listing->area }}" required>
        </div>
        <div class="mb-3">
            <label>Гостей</label>
            <input type="number" name="guests" class="form-control" value="{{ $listing->guests }}" required>
        </div>
        <div class="mb-3">
            <label>Спальни</label>
            <input type="number" name="bedrooms" class="form-control" value="{{ $listing->bedrooms }}" required>
        </div>
        <div class="mb-3">
            <label>Адрес</label>
            <input type="text" name="location_address" class="form-control" value="{{ $listing->location_address }}" required>
        </div>
        <div class="mb-3">
            <label>Рядом</label>
            <input type="text" name="location_nearby" class="form-control" value="{{ $listing->location_nearby }}" required>
        </div>
        <div class="mb-3">
            <label>Цена за ночь</label>
            <input type="number" step="0.01" name="price_per_night" class="form-control" value="{{ $listing->price_per_night }}" required>
        </div>
        <button class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection --}}