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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('description_full')->nullable(); // подробное описание
            $table->integer('area'); // площадь в м²
            $table->integer('guests'); // количество гостей
            $table->integer('bedrooms'); // количество спален
            $table->string('location_address'); // полный адрес
            $table->string('location_nearby')->nullable(); // что рядом (парк Горького и т. д.)
            $table->text('location_details')->nullable(); // детали о районе и инфраструктуре
            $table->decimal('price_per_night', 8, 2); // цена за сутки
            $table->time('check_in_time')->default('14:00:00'); // время заезда
            $table->time('check_out_time')->default('12:00:00'); // время выезда
            $table->decimal('deposit', 8, 2)->nullable(); // депозит
            $table->text('house_rules')->nullable(); // правила проживания
            $table->unsignedBigInteger('owner_id'); // владелец
            $table->date('available_from')->nullable();
            $table->date('available_to')->nullable();

            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // связь с таблицей пользователей

            $table->timestamps();
        });

        // Таблица удобств
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('feature_name')->unique(); // название удобства
            $table->timestamps();
        });

        // Связующая таблица для связи «многие‑ко‑многим»
        Schema::create('listing_features', function (Blueprint $table) {
            $table->unsignedBigInteger('listing_id');
            $table->unsignedBigInteger('feature_id');

            $table->primary(['listing_id', 'feature_id']); // составной первичный ключ

            $table->foreign('listing_id')
                ->references('id')
                ->on('listings')
                ->onDelete('cascade');

            $table->foreign('feature_id')
                ->references('id')
                ->on('features')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_features');
        Schema::dropIfExists('features');
        Schema::dropIfExists('listings');
    }
};
