@extends('layouts.app')
@section('title', 'Поиск')


@section('content')
<div class="wrapper">
    <div class="search-section" style="background: #020f46; padding: 10px 20px;">
        <form method="GET" action="{{ route('listings.index') }}" class="d-flex align-items-center flex-wrap" id="searchForm" style="gap: 15px; background: #020f46; padding: 10px;">
    <!-- Минимальная цена -->
    <div class="form-group d-flex flex-column" style="min-width: 210px;">
        <label class="text-white mb-1" style="font-size: 14px;">Минимальная цена:</label>
        <input type="number" name="priceMin" value="{{ old('priceMin', $filterData['priceMin'] ?? '') }}"
            class="form-control form-control-sm" placeholder="от" style="border-radius: 4px; font-size: 14px;">
    </div>

    <!-- Город -->
    <div class="form-group d-flex flex-column" style="min-width: 200px;">
        <label class="text-white mb-1" style="font-size: 14px;">Город:</label>
        <input name="city" value="{{ old('city', $filterData['city'] ?? '') }}"
            class="form-control form-control-sm" placeholder="Введите город" style="border-radius: 4px; font-size: 14px;">
    </div>

    <!-- Количество комнат -->
    <div class="form-group d-flex flex-column" style="min-width: 200px;">
        <label class="text-white mb-1" style="font-size: 14px;">Комнат:</label>
        <select name="rooms" class="form-select form-select-sm" style="border-radius: 4px; font-size: 14px;">
            <option value="">Все</option>
            <option value="1" {{ old('rooms', $filterData['rooms'] ?? '') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('rooms', $filterData['rooms'] ?? '') == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ old('rooms', $filterData['rooms'] ?? '') == '3' ? 'selected' : '' }}>3+</option>
        </select>
    </div>

    <!-- Заезд -->
    <div class="form-group d-flex flex-column" style="min-width: 200px;">
        <label class="text-white mb-1" style="font-size: 14px;">Заезд:</label>
        <input type="date" name="check_in" value="{{ old('check_in', $filterData['check_in'] ?? '') }}"
            class="form-control form-control-sm" style="border-radius: 4px; font-size: 14px;">
    </div>

    <!-- Выезд -->
    <div class="form-group d-flex flex-column" style="min-width: 200px;">
        <label class="text-white mb-1" style="font-size: 14px;">Выезд:</label>
        <input type="date" name="check_out" value="{{ old('check_out', $filterData['check_out'] ?? '') }}"
            class="form-control form-control-sm" style="border-radius: 4px; font-size: 14px;">
    </div>

    <!-- Кнопка, размещенная справа -->
    <div class="ms-auto" style="display: flex; align-items: center;">
        <button class="sudmit" style="height: 38px; min-width: 120px; background: #f8f8f8; color: black; border-radius: 6px; border: none;  margin-right: 30px;">
            Найти
        </button>
    </div>
</form>
    </div>

    <div class="listings">
        <div class="listing">
            <div class="listing-header">
                <h3>Найдено {{ $listings->count() }} вариантов жилья</h3>
            </div>

            @foreach($listings as $listing)
            <!-- Каждый вариант -->
            <div class="card popular">
                <div class="card-body">
                    @if($listing->photos->isNotEmpty())
                        @php $firstPhoto = $listing->photos->first(); @endphp
                        <img src="{{ asset('storage/' . $firstPhoto->url) }}" alt="Фото" />
                    @else
                        <img src="/storage/no_photo_new.jpg" alt="Нет фото" />
                    @endif
                    <div class="card-header" style="background-color:rgb(254 254 254 / 3%); border-bottom: none;">
                        <h4>{{ $listing->title ?? 'Квартира' }}</h4><br>
                        <!-- Можно добавить метки, например, "Супервыгодно" -->
                        <span class="label">Супервыгодно</span><br><br>
                        <p> • {{ $listing->area ?? '0' }} м² • {{ $listing->guests ?? '0' }} гостей • {{ $listing->bedrooms ?? '0' }} спальни</p>
                        <p>{{ $listing->description ?? 'Описание отсутствует' }}</p>
                        <p>{{ $listing->location_address ?? '' }}</p>
                    </div>
                    <div class="actions" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
                        <p class="price">{{ $listing->price_per_night ?? '0' }} ₽ за сутки</p>
                        <p style="width:200px; color: black;">Рядом: {{ $listing->location_nearby ?? '' }}</p>
                        <p style="width:200px; color: black;"><a href="{{ route('listing.show', ['id' => $listing->id]) }}">Подробнее</a></p>
                    </div>

                </div>
            </div>
            @endforeach

            <!-- Если нет вариантов -->
            @if($listings->isEmpty())
                <p>Нет подходящих вариантов по вашему запросу.</p>
            @endif
        </div>
        <div class="pagination-wrapper" style="margin-top: 6px; display: flex; justify-content: center; ">
            {{ $listings->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>

@endsection