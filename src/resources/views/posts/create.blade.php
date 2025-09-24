{{-- create.blade.php --}}
@extends('layouts.app')

@section('title', 'Создание нового поста')

@section('content')
<div class="post-form">
    <h1 class="form-title">Создание нового поста</h1>
    
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="title">Заголовок</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}" 
                   class="form-input" 
                   placeholder="Введите заголовок поста"
                   required>
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Содержание</label>
            <textarea id="content" 
                      name="content" 
                      class="form-textarea" 
                      placeholder="Напишите содержание вашего поста..."
                      required>{{ old('content') }}</textarea>
            @error('content')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="form-hint">Минимальная длина: 10 символов</div>
        </div>

        <div class="form-actions">
            <a href="{{ route('posts.index') }}" class="btn-cancel">Отмена</a>
            <button type="submit" class="btn-submit">Опубликовать пост</button>
        </div>
    </form>
</div>
@endsection