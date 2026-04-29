<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
// В PhotoController.php
    public function upload(Request $request)
    {
        $request->validate([
            'photos.*' => 'image|max:2048', // допустим, максимум 2MB на фото
        ]);

        $photoIds = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $url = $file->store('photos', 'public');
                $photo = \App\Models\Photo::create([
                    'url' => $url,
                    // другие поля, если есть
                ]);
                $photoIds[] = $photo->id;
            }
        }

        // Сохраняем ID фотографий в сессию, чтобы потом вставить в форму объявления
        session(['photos_ids' => $photoIds]);

        return redirect()->route('create');
    }
}