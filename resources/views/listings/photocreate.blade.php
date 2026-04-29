@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h2>Добавить фотографии</h2>
    <form action="{{ route('photos.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="photos">Выберите фотографии</label>
            <input type="file" name="photos[]" id="photos" multiple class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Загрузить фотографии</button>
    </form>
    <a href="{{ route('create') }}" class="btn btn-secondary mt-3">Дальше</a>
</div>
@endsection