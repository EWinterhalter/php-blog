@extends('layouts.app')

@section('title', 'Список постов')

@section('content')
<h1>Список постов</h1>

<form method="GET">
    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Поиск">
    <button class="search-btn">Искать</button>
</form>

@foreach($posts as $post)
    <div class="border-b my-2">
        <a href="{{ route('posts.show', $post) }}"><h2>{{ $post->title }}</h2></a>
        <p>{{ Str::limit($post->content,150) }}</p>

        @can('update',$post)
            <a href="{{ route('posts.edit',$post) }}">Редактировать</a>
        @endcan

        @can('delete',$post)
            <form method="POST" action="{{ route('posts.destroy',$post) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn-delete">Удалить</button>
            </form>
        @endcan
    </div>
@endforeach

{{ $posts->links() }}
@endsection