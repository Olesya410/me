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
        Schema::create('host_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // кто оставил отзыв
            $table->integer('host_id'); // арендодатель
            $table->text('review');
            $table->timestamps();

            // внешние ключи
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('host_id')->references('id')->on('users')->onDelete('cascade'); // предполагается, что арендодатель — это пользователь
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('host_reviews');
    }
};
