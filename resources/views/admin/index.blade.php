@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Админ панель Laravel</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container my-4">
<h3><a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: inherit; text-decoration: none;">Аренда квартир</a></h3>
<h2>Обзор</h2>
<p>Добро пожаловать в административную панель.</p>

<h2>Все объявления</h2>
<table class="table table-striped mb-4">
  <thead>
    <tr>
      <th>ID</th>
      <th>Название</th>
      <th>Цена</th>
      <th>Адрес</th>
      <th>Дата сдачи квартиры</th>
      <th>Статус</th>
    </tr>
  </thead>
  <tbody>
    @foreach($listings as $listing)
    @php
        $today = Carbon::now()->startOfDay();
        $endDate = Carbon::parse($listing->available_to)->startOfDay();
        $diffDays = $today->diffInDays($endDate, false); // отрицательное число, если дата в прошлом
    @endphp
    <tr>
        <td>{{ $listing->id }}</td>
        <td>{{ $listing->title }}</td>
        <td>{{ $listing->price_per_night }}</td>
        <td>{{ $listing->location_address }}</td>
        <td>С {{ $listing->available_from }} до {{ $listing->available_to }}</td>
        <td>
            @if($diffDays >= 0)
                <span class="badge bg-success">Активна (осталось {{ $diffDays }} дней)</span>
            @else
                <span class="badge bg-secondary">Неактивна</span>
            @endif
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<h2>Все пользователи</h2>
<table class="table table-striped mb-4">
  <thead>
    <tr>
      <th>ID</th>
      <th>Имя</th>
      <th>Email</th>
      <th>Роль</th>
      <th>Действия</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role_id }}</td>
        <td>
          <!-- Кнопка редактирования -->
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Редактировать</a>

          <!-- Форма для удаления -->
          <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">Удалить</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-outline-secondary btn-lg px-4 mb-2" style="background-color: #12215f; color: #fff; border: none; cursor: pointer;">
        <i class="bi bi-box-arrow-right me-2">Выход</i>
    </button>
</form>

</div>

</body>
</html>