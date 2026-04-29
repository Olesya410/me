@extends('layouts.app')
@section('title', 'Популярные места и идеи для путешествий')

@section('content')
<body class="bg-light">
    <div class="wrapper">
        <div class="container my-4">
            <div class="wrapper">
                <h1 class="text-center mb-4">Интересные места и идеи для путешествий по городам России</h1>
                <p class="text-center lead">Планирование путешествия — важная часть отдыха и открытия нового. В этом обзоре собраны популярные достопримечательности и направления для вдохновения.</p>

                <!-- Города-миллионники и мегаполисы -->
                <section class="mb-5">
                    <h2 class="border-bottom pb-2 mb-3 text-dark">Города-миллионники и мегаполисы</h2>

                    <!-- Москва -->
                    <div>
                        <h3 class="city-name mb-3">Москва</h3>
                        <p><strong>Краткая характеристика:</strong> столица России, политический, экономический и культурный центр.</p>
                        <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Красная площадь и Кремль</li>
                    <li class="list-group-item landmark">Храм Василия Блаженного</li>
                    <li class="list-group-item landmark">Третьяковская галерея</li>
                    <li class="list-group-item landmark">ВДНХ</li>
                    <li class="list-group-item landmark">Парк Горького</li>
                    <li class="list-group-item landmark">«Москва‑Сити»</li>
                    <li class="list-group-item landmark">Большой театр</li>
                    <li class="list-group-item landmark">Арбат</li>
                </ul>
                    </div>

                    <!-- Санкт‑Петербург -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Санкт‑Петербург</h3>
                <p><strong>Краткая характеристика:</strong> культурная столица, город дворцов и каналов.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Эрмитаж</li>
                    <li class="list-group-item landmark">Невский проспект</li>
                    <li class="list-group-item landmark">Петропавловская крепость</li>
                    <li class="list-group-item landmark">Исаакиевский собор</li>
                    <li class="list-group-item landmark">Спас на Крови</li>
                    <li class="list-group-item landmark">Петергоф</li>
                    <li class="list-group-item landmark">Царское Село</li>
                    <li class="list-group-item landmark">Казанский собор</li>
                </ul>
                    </div>

                    <!-- Новосибирск -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Новосибирск</h3>
                <p><strong>Краткая характеристика:</strong> крупнейший город Сибири, научный и транспортный узел.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Новосибирский зоопарк</li>
                    <li class="list-group-item landmark">Академгородок</li>
                    <li class="list-group-item landmark">Театр оперы и балета</li>
                    <li class="list-group-item landmark">Красный проспект</li>
                    <li class="list-group-item landmark">Собор Александра Невского</li>
                </ul>
                    </div>

                    <!-- Екатеринбург -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Екатеринбург</h3>
                <p><strong>Краткая характеристика:</strong> столица Урала, город на границе Европы и Азии.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Храм на Крови</li>
                    <li class="list-group-item landmark">Плотина Городского пруда</li>
                    <li class="list-group-item landmark">Небоскрёб «Высоцкий»</li>
                    <li class="list-group-item landmark">Улица Вайнера</li>
                    <li class="list-group-item landmark">Ельцин‑центр</li>
                </ul>
                    </div>

                    <!-- Казань -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Казань</h3>
                <p><strong>Краткая характеристика:</strong> столица Татарстана, где встречаются Восток и Запад.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Казанский кремль</li>
                    <li class="list-group-item landmark">Мечеть Кул‑Шариф</li>
                    <li class="list-group-item landmark">Улица Баумана</li>
                    <li class="list-group-item landmark">Дворец земледельцев</li>
                    <li class="list-group-item landmark">Кремлёвская набережная</li>
                </ul>
                    </div>
                </section>

                <!-- Города Золотого кольца -->
                <section class="mb-5">
                    <h2 class="border-bottom pb-2 mb-3 text-dark">Города Золотого кольца</h2>

                    <!-- Ярославль -->
                    <div>
                <h3 class="city-name mb-3">Ярославль</h3>
                <p><strong>Краткая характеристика:</strong> старейший город на Волге, объект ЮНЕСКО.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Стрелка (слияние Волги и Которосли)</li>
                    <li class="list-group-item landmark">Церковь Ильи Пророка</li>
                    <li class="list-group-item landmark">Волжская набережная</li>
                    <li class="list-group-item landmark">Ярославский кремль</li>
                </ul>
                    </div>

                    <!-- Владимир -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Владимир</h3>
                <p><strong>Краткая характеристика:</strong> древняя столица Северо‑Восточной Руси.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Золотые ворота</li>
                    <li class="list-group-item landmark">Успенский собор</li>
                    <li class="list-group-item landmark">Дмитриевский собор (все — объекты ЮНЕСКО)</li>
                </ul>
                    </div>

                    <!-- Суздаль -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Суздаль</h3>
                <p><strong>Краткая характеристика:</strong> город‑музей под открытым небом.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Суздальский кремль</li>
                    <li class="list-group-item landmark">Музей деревянного зодчества</li>
                    <li class="list-group-item landmark">Покровский монастырь</li>
                </ul>
                    </div>

                    <!-- Ростов Великий -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Ростов Великий</h3>
                <p><strong>Краткая характеристика:</strong> один из древнейших городов России.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Ростовский кремль</li>
                    <li class="list-group-item landmark">Озеро Неро</li>
                    <li class="list-group-item landmark">Спасо‑Яковлевский монастырь</li>
                </ul>
                    </div>
                </section>

                            <!-- Южные города -->
                <section class="mb-5">
                    <h2 class="border-bottom pb-2 mb-3 text-dark">Южные города</h2>

                    <!-- Сочи -->
                    <div>
                        <h3 class="city-name mb-3">Сочи</h3>
                        <p><strong>Краткая характеристика:</strong> главный курорт России на Чёрном море.</p>
                        <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Олимпийский парк</li>
                    <li class="list-group-item landmark">Дендрарий</li>
                    <li class="list-group-item landmark">Морской вокзал</li>
                    <li class="list-group-item landmark">Красная Поляна</li>
                    <li class="list-group-item landmark">Сочи Парк</li>
                </ul>
                    </div>

                    <!-- Краснодар -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Краснодар</h3>
                <p><strong>Краткая характеристика:</strong> административный центр Кубани.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Улица Красная</li>
                    <li class="list-group-item landmark">Парк «Краснодар» (парк Галицкого)</li>
                    <li class="list-group-item landmark">Екатерининский сквер</li>
                    <li class="list-group-item landmark">Кубанская набережная</li>
                </ul>
                    </div>

                    <!-- Волгоград -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Волгоград</h3>
                <p><strong>Краткая характеристика:</strong> город‑герой, место Сталинградской битвы.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Мамаев курган и скульптура «Родина‑мать зовёт!»</li>
                    <li class="list-group-item landmark">Музей‑панорама «Сталинградская битва»</li>
                    <li class="list-group-item landmark">Набережная 62‑й Армии</li>
                </ul>
                    </div>
                </section>

                <!-- Дальний Восток и Сибирь -->
                <section class="mb-5">
                    <h2 class="border-bottom pb-2 mb-3 text-dark">Дальний Восток и Сибирь</h2>

                    <!-- Владивосток -->
                    <div>
                <h3 class="city-name mb-3">Владивосток</h3>
                <p><strong>Краткая характеристика:</strong> морские ворота России, конечная точка Транссиба.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Русский мост</li>
                    <li class="list-group-item landmark">Золотой мост</li>
                    <li class="list-group-item landmark">Набережная Цесаревича</li>
                    <li class="list-group-item landmark">Фуникулёр</li>
                    <li class="list-group-item landmark">Остров Русский</li>
                </ul>
                    </div>

                    <!-- Иркутск -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Иркутск</h3>
                <p><strong>Краткая характеристика:</strong> ворота к озеру Байкал.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">130‑й квартал (историческая зона)</li>
                    <li class="list-group-item landmark">Набережная Ангары</li>
                    <li class="list-group-item landmark">Знаменский монастырь</li>
                    <li class="list-group-item landmark">Кругобайкальская железная дорога (рядом)</li>
                </ul>
                    </div>

                    <!-- Якутск -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Якутск</h3>
                <p><strong>Краткая характеристика:</strong> крупнейший город в зоне вечной мерзлоты.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Музей мамонта</li>
                    <li class="list-group-item landmark">Ленские столбы (в окрестностях)</li>
                    <li class="list-group-item landmark">Якутский кремль</li>
                </ul>
                    </div>
                </section>

                <!-- Другие значимые города -->
                <section class="mb-5">
                    <h2 class="border-bottom pb-2 mb-3 text-dark">Другие значимые города</h2>

                    <!-- Калининград -->
                    <div>
                <h3 class="city-name mb-3">Калининград</h3>
                <p><strong>Краткая характеристика:</strong> самый западный город России, бывшая столица Восточной Пруссии.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Кафедральный собор на острове Канта</li>
                    <li class="list-group-item landmark">Музей Мирового океана</li>
                    <li class="list-group-item landmark">Район Амалиенау</li>
                    <li class="list-group-item landmark">Куршская коса</li>
                </ul>
                    </div>

                    <!-- Нижний Новгород -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Нижний Новгород</h3>
                <p><strong>Краткая характеристика:</strong> город на слиянии Волги и Оки.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Нижегородский кремль</li>
                    <li class="list-group-item landmark">Чкаловская лестница</li>
                    <li class="list-group-item landmark">Большая Покровская улица</li>
                    <li class="list-group-item landmark">Стрелка</li>
                </ul>
                    </div>

                    <!-- Архангельск -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Архангельск</h3>
                <p><strong>Краткая характеристика:</strong> «ворота в Арктику», исторический порт.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Набережная Северной Двины</li>
                    <li class="list-group-item landmark">Гостиный двор</li>
                    <li class="list-group-item landmark">Малые Корелы (музей деревянного зодчества)</li>
                </ul>
                    </div>

                    <!-- Грозный -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Грозный</h3>
                <p><strong>Краткая характеристика:</strong> столица Чеченской Республики, символ возрождения.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Мечеть «Сердце Чечни»</li>
                    <li class="list-group-item landmark">Грозный‑Сити</li>
                    <li class="list-group-item landmark">Цветочный парк</li>
                    <li class="list-group-item landmark">Храм Архангела Михаила</li>
                </ul>
                    </div>

                    <!-- Дербент -->
                    <div class="mt-4">
                <h3 class="city-name mb-3">Дербент</h3>
                <p><strong>Краткая характеристика:</strong> древнейший город России.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item landmark">Крепость Нарын‑Кала (объект ЮНЕСКО)</li>
                    <li class="list-group-item landmark">Старая часть города</li>
                    <li class="list-group-item landmark">Джума‑мечеть</li>
                </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
@endsection