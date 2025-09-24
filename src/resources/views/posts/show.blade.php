@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="post-detail">
    <div class="post-header">
        <h1 class="post-title">{{ $post->title }}</h1>
        
        <div class="post-meta">
            <span class="post-author">Автор: {{ $post->user->name }}</span>
            <span class="post-date">Опубликовано: {{ $post->created_at->format('d.m.Y H:i') }}</span>
            
            @if($post->created_at != $post->updated_at)
                <span class="update-info">Обновлено: {{ $post->updated_at->format('d.m.Y H:i') }}</span>
            @endif
        </div>
    </div>

    <div class="post-content">
        <p>{{ $post->content }}</p>
    </div>

    @can('update', $post)
    <div class="post-actions">
        <a href="{{ route('posts.edit', $post) }}" class="btn-edit">
            Редактировать пост
        </a>

        @can('delete', $post)
        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="delete-form" 
              onsubmit="return confirm('Вы уверены, что хотите удалить этот пост?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">
                Удалить пост
            </button>
        </form>
        @endcan
    </div>
    @endcan
</div>

<div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('posts.index') }}" class="btn-back">
        ← Назад к списку постов
    </a>
</div>
@endsection