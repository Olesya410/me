<nav class="navbar navbar-expand-lg bg-light shadow-sm mb-4" style="font-size: 1.25rem; font-family: Arial, sans-serif;">
  <div class="container d-flex justify-content-between align-items-center">
    <!-- Название слева -->
    <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: inherit; text-decoration: none;">Квартира NOW</a>
    <!-- Кнопка для мобильных устройств -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Меню справа -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto d-flex flex-row list-unstyled mb-0" style="font-size: 1.25rem; font-family: Arial, sans-serif;">
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('listings.index') }}" style="color: inherit; text-decoration: none;">Услуги</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('bookings.index') }}" style="color: inherit; text-decoration: none;">Бронирование</a>
        </li>
        <li class="nav-item mx-2">
          @if(Auth::check())
            <a href="{{ route('profile.show', ['user' => Auth::user()->id]) }}" class="nav-link" style="color: inherit; text-decoration: none;">
              {{ Auth::user()->name }}
            </a>
          @else
            <a class="nav-link" href="{{ route('login') }}" style="color: inherit; text-decoration: none;">Вход</a>
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>