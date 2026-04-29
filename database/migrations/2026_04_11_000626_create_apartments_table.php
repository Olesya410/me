<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id(); // ID квартиры
            $table->integer('user_id')->constrained('users')->onDelete('cascade'); // ссылка на пользователя
            $table->string('title'); // название
            $table->text('description'); // описание
            $table->decimal('price_per_night', 10, 2); // цена за ночь
            $table->integer('city_id')->constrained('cities')->onDelete('cascade'); // город
            $table->string('address'); // адрес
            $table->integer('rooms'); // комнаты
            $table->integer('beds'); // кровати
            $table->integer('bathrooms'); // ванные
            $table->text('amenities')->nullable(); // удобства (можно заменить на TEXT)
            $table->timestamps(); // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
