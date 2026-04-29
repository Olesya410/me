@extends('layouts.app')
@section('title', 'Главная страница')

@section('content')
<div class="wrapper">
  <!-- Блок "Преимущества" -->
  <section id="advantages" class="container mb-5">
    <div class="info-block text-center text-dark">
      <h3 class="mb-4">Почему выбирают наши квартиры?</h3>
      <p class="mb-4">Мы предлагаем уютные квартиры в лучших районах города, прозрачные цены, гибкие условия бронирования и круглосуточную поддержку. Ваш комфорт — наша главная задача!</p>
      <a href="{{ route('listings.index') }}" class="btn btn-primary btn-lg" style="background-color: #020f46; border-color: #020f46;"><i>Забронировать сейчас</i></a>
    </div>
  </section>

  <section id="cities" class="container mb-5">
    <h2 class="text-center mb-4 section-title">Популярные города</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <!-- Москва -->
      <div class="col">
        <a href="{{ url('/popular-places') }}#moscow" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm rounded card-hover">
            <img src="/storage/Moscow.jpg" class="card-img-top" alt="Москва" />
            <h5 class="mb-2 p-2">Москва</h5>
            <p class="text-muted mb-0 p-2">Более 100 вариантов квартир для любого бюджета</p>
          </div>
        </a>
      </div>
      <!-- Санкт-Петербург -->
      <div class="col">
        <a href="{{ url('/popular-places') }}#spb" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm rounded card-hover">
            <img src="/storage/Saint-Petersburg.jpg" class="card-img-top" alt="Санкт-Петербург" />
            <h5 class="mb-2 p-2">Санкт-Петербург</h5>
            <p class="text-muted mb-0 p-2">Комфортные квартиры у набережных и в центре</p>
          </div>
        </a>
      </div>
      <!-- Казань -->
      <div class="col">
        <a href="{{ url('/popular-places') }}#kazan" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm rounded card-hover">
            <img src="/storage/Kazan.jpeg" class="card-img-top" alt="Казань" />
            <h5 class="mb-2 p-2">Казань</h5>
            <p class="text-muted mb-0 p-2">От уютных студий до просторных апартаментов</p>
          </div>
        </a>
      </div>
      <!-- Калининград -->
      <div class="col">
        <a href="{{ url('/popular-places') }}#kaliningrad" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm rounded card-hover">
            <img src="/storage/Kaliningrad.jpg" class="card-img-top" alt="Калининград" />
            <h5 class="mb-2 p-2">Калининград</h5>
            <p class="text-muted mb-0 p-2">Исторический город с янтарными музеями и крепостями.</p>
          </div>
        </a>
      </div>
      <!-- Сочи -->
      <div class="col">
        <a href="{{ url('/popular-places') }}#sochi" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm rounded card-hover">
            <img src="/storage/Sochi.jpeg" class="card-img-top" alt="Сочи" />
            <h5 class="mb-2 p-2">Сочи</h5>
            <p class="text-muted mb-0 p-2">Горнолыжные курорты, пляжи и живописные виды.</p>
          </div>
        </a>
      </div>
      <!-- Екатеринбург -->
      <div class="col">
        <a href="{{ url('/popular-places') }}#ekaterinburg" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm rounded card-hover">
            <img src="/storage/ekaterinburg.jpeg" class="card-img-top" alt="Екатеринбург" />
            <h5 class="mb-2 p-2">Екатеринбург</h5>
            <p class="text-muted mb-0 p-2">Крупный город с богатой историей и современным стилем.</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section id="how-it-works" class="container mb-5">
    <h2 class="text-center mb-4 section-title">Как это работает</h2>
    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="card border-0">
            <h4 class="card-title mb-3">Выберите квартиру</h4>
            <p class="card-text">Просмотрите доступные варианты в выбранном городе, ознакомьтесь с фото и условиями бронирования.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0">
            <h4 class="card-title mb-3">Забронируйте онлайн</h4>
            <p class="card-text">Заполните форму или позвоните нам — и квартира закреплена за вами.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0">
            <h4 class="card-title mb-3">Заселяйтесь и отдыхайте</h4>
            <p class="card-text">Получите ключи и наслаждайтесь комфортным отдыхом в выбранной квартире.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="faq" class="container mb-5 faq">
    <h2 class="text-center mb-4 section-title">Часто задаваемые вопросы</h2>
    <div class="accordion" id="faqAccordion">
      <!-- Вопрос 1 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Как забронировать квартиру?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Вы можете выбрать понравившуюся квартиру на сайте, оставить заявку или позвонить нам — мы оформим бронь в кратчайшие сроки.
          </div>
        </div>
      </div>
      <!-- Вопрос 2 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Можно ли отменить бронирование?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Да, условия отмены зависят от выбранного объекта и времени бронирования. Подробнее уточняйте у менеджера.
          </div>
        </div>
      </div>
      <!-- Вопрос 3 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Как оплатить?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Оплата производится онлайн при бронировании или по факту заселения наличными или картой.
          </div>
        </div>
      </div>
      <!-- Вопрос 4 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Что входит в стоимость?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            В стоимость включены коммунальные услуги, интернет и уборка (по условиям). Детали уточняйте при бронировании.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="container mb-5">
    <h2 class="text-center mb-4 section-title">Идея для отпуска</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4 section-ideas">
      <!-- Карточка 1 -->
      <div class="col">
        <div class="card h-100 text-center border-0 shadow-sm rounded">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Идея для поездок</h5>
            <div class="mb-3">
              <img src="/storage/idea_for_trips.avif" class="img-fluid rounded" alt="Идея для поездок" />
            </div>
            <a href="{{ url('/where-to-go') }}#kuda-poekhat-etoy-vesnoy" style="color: inherit; text-decoration: none;">Куда поехать этой весной</a>
          </div>
        </div>
      </div>
      <!-- Карточка 2 -->
      <div class="col">
        <div class="card h-100 text-center border-0 shadow-sm rounded">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Культурное погружение</h5>
            <div class="mb-3">
              <img src="/storage/cultural_immersion.jpg" class="img-fluid rounded" alt="Культурное погружение" />
            </div>
            <a href="{{ url('/where-to-go') }}#kulture-noe-pogruzhenie" style="color: inherit; text-decoration: none;">15 регионов России для гурманов</a>
          </div>
        </div>
      </div>
      <!-- Карточка 3 -->
      <div class="col">
        <div class="card h-100 text-center border-0 shadow-sm rounded">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Практика</h5>
            <div class="mb-3">
              <img src="/storage/practice.jpg" class="img-fluid rounded" alt="Практика" />
            </div>
            <a href="{{ url('/where-to-go') }}#praktika-2026" style="color: inherit; text-decoration: none;">Что изменилось для туристов в 2026 году</a>
          </div>
        </div>
      </div>
      <!-- Карточка 4 -->
      <div class="col">
        <div class="card h-100 text-center border-0 shadow-sm rounded">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Без визы</h5>
            <div class="mb-3">
              <img src="/storage/without_visa.jpeg" class="img-fluid rounded" alt="Без визы" />
            </div>
            <a href="{{ url('/where-to-go') }}#bez-vizy-15-stran" style="color: inherit; text-decoration: none;">15 безвизовых стран</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection