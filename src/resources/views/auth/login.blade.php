@extends('layouts.app')

@section('title','Вход')

@section('content')
<h1>Вход</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')<div>{{ $message }}</div>@enderror

    <label>Пароль:</label>
    <input type="password" name="password">
    @error('password')<div>{{ $message }}</div>@enderror

    <button class="yes">Войти</button>
</form>
<a href="{{ route('register') }}">Нет аккаунта? Зарегистрироваться</a>
@endsection
