<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    // Укажите, какие поля можно массово заполнять
    protected $fillable = [
        'user_id',
        'date',
        // добавьте другие поля по необходимости
    ];

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
