<!-- HTML -->
<footer class="custom-footer py-4 mt-5 bg-light border-top">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">

      <!-- Логотип -->
      <div class="mb-3 mb-md-0 d-flex align-items-center">
        <img src="/storage/logo.png" alt="Квартира_NOW" class="logo-img" style="height: 150px;">
      </div>

      <!-- Навигация -->
      <div class="d-flex flex-nowrap mx-3">
        <a class="navbar-brand fw-bold mx-3" href="{{ route('listings.index') }}" style="color: inherit; text-decoration: none;">Услуги</a>
        <a class="navbar-brand fw-bold mx-3" href="{{ route('bookings.index') }}" style="color: inherit; text-decoration: none;">Забронировать</a>
        <a class="navbar-brand fw-bold mx-3" href="{{ route('home') }}" style="color: inherit; text-decoration: none;">Квартира NOW</a>
      </div>

      <!-- Контакт -->
      <div class="d-flex flex-column align-items-end">
        <p class="mb-0"><strong>Почта:</strong> info@kvartira_now.ru</p>
        <p class="mb-0"><strong>Телефон:</strong> +7 (123) 456-78-90</p>
      </div>

    </div>
  </div>
</footer>