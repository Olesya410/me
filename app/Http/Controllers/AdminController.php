<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing; // предполагается, что есть модель Listing

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // получить всех пользователей
        $listings = Listing::all(); // получить все объявления

        return view('admin.index', compact('users', 'listings'));
    }
}