<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Блог')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Мини-Блог</h1>
            <div class="nav-container">
                <div class="nav-main">
                    <a href="{{ route('posts.index') }}" class="nav-link">Главная</a>
                    
                    @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-new-post">Новый пост</a>
                    @endauth
                </div>
                
                <div class="nav-auth">
                    @auth
                        <span>Добро пожаловать, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn btn-logout">Выйти</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-auth">Войти</a>
                        <a href="{{ route('register') }}" class="btn btn-auth">Регистрация</a>
                    @endauth
                </div>
            </div>
        </header>
        
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>