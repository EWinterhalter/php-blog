@extends('layouts.app')

@section('title','Редактировать пост')

@section('content')
<h1>Редактировать пост</h1>

<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')

    <label>Заголовок</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}">
    @error('title')<div>{{ $message }}</div>@enderror

    <label>Контент</label>
    <textarea name="content" class="form-textarea" >{{ old('content', $post->content) }}</textarea>
    @error('content')<div>{{ $message }}</div>@enderror

    <button class="yes">Сохранить</button>
</form>

<a href="{{ route('posts.show', $post) }}">Назад к посту</a>
@endsection
