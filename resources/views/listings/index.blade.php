@extends('layouts.app')

@section('title', 'Мои бронирования')

@section('content')
<div class="container mt-3">
<div class="wrapper">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container my-5">

        @if($bookings->isEmpty())
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="bi bi-calendar-check text-secondary" style="font-size: 4rem; opacity: 0.3;"></i>
                </div>
                <h2 class="text-muted mb-3">У вас пока нет бронирований</h2>
                <h3 class="text-muted mb-4">Выбирайте жильё сейчас — все ваши бронирования появятся здесь</h3>
                <p>Если вы не вошли в аккаунт или у вас его нет, вы не сможете забронировать квартиру.</p>
                <a href="{{ route('listings.index') }}" type="submit" style="border-radius: 8px; background-color:  #12215f; color: white; text-decoration: none; padding: 12px;">
                    <i class="bi bi-search me-2">Начать поиск жилья</i>
                </a>
            </div>
        @else
            <div class="card" style="width:auto; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 20px;">
                @foreach($bookings as $booking)
                    <div class="row align-items-start mb-4">
                        <div class="col-md-8">
                            <h5 class="fw-semibold mb-2">{{ $booking->listing->title }}</h5>
                        </div>
                        <div class="col-md-4 text-end">
                            @php
                                $now = \Carbon\Carbon::now();
                                $isActive = \Carbon\Carbon::parse($booking->check_out)->greaterThan($now);
                            @endphp
                            @if($isActive)
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">Активно</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2">Истек</span>
                            @endif
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-calendar-event text-primary me-2"></i>
                            <strong class="me-1">Заезд:</strong>
                            <span>{{ \Carbon\Carbon::parse($booking->check_in)->format('d.m.Y') }}</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-calendar-x text-danger me-2"></i>
                            <strong class="me-1">Выезд:</strong>
                            <span>{{ \Carbon\Carbon::parse($booking->check_out)->format('d.m.Y') }}</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-house text-success me-2"></i>
                            <strong class="me-1">Цена:</strong>
                            <span>{{ number_format($booking->listing->price_per_night, 0, ' ', ' ') }} ₽ / сутки</span>
                        </li>
                    </ul>
                    <p style="width:200px; color: black;"><a href="{{ route('listing.show', ['id' => $booking->id]) }}">Подробнее</a></p>
                    @if($isActive)
                        <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Вы уверены, что хотите отменить это бронирование?')">
                                <i class="bi bi-trash me-2">Отменить бронирование</i>
                            </button>
                        </form>
                    @endif
                @endforeach
            </div> 
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .hover-shadow:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    }

    .card {
        transition: all 0.3s ease;
        border-radius: 12px;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
    }
</style>
@endpush