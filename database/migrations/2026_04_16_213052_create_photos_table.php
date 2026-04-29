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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            // Связь с пользователем
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Связь с объявлением
            $table->foreignId('listing_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('url'); // Путь к фото, например, '/storage/photos/1.jpg'
            $table->text('description')->nullable(); // Опциональное описание
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};