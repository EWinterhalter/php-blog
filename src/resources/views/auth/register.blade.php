@extends('layouts.app')

@section('title','Регистрация')

@section('content')
<h1>Регистрация</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Имя:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')<div>{{ $message }}</div>@enderror

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')<div>{{ $message }}</div>@enderror

    <label>Пароль:</label>
    <input type="password" name="password">
    @error('password')<div>{{ $message }}</div>@enderror

    <label>Повтор пароля:</label>
    <input type="password" name="password_confirmation">

    <button class="yes">Зарегистрироваться</button>
</form>
<a href="{{ route('login') }}">Уже есть аккаунт? Войти</a>
@endsection
