<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'szukamdja.pl')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f7fb; color: #222; }
        header { background: #111827; color: #fff; padding: 12px 20px; }
        nav a { color: #fff; margin-right: 12px; text-decoration: none; }
        .container { max-width: 1000px; margin: 24px auto; background: #fff; border-radius: 10px; padding: 20px; }
        .grid { display: grid; gap: 12px; }
        input, select, button { padding: 10px; width: 100%; box-sizing: border-box; }
        button { background: #2563eb; color: #fff; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        .alert { padding: 10px; border-radius: 8px; margin-bottom: 10px; }
        .ok { background: #dcfce7; }
        .err { background: #fee2e2; }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="{{ route('inquiry.create') }}">Formularz klienta</a>
        @guest
            <a href="{{ route('login') }}">Logowanie</a>
            <a href="{{ route('register') }}">Rejestracja DJ</a>
        @else
            @if(auth()->user()->role === 'dj')
                <a href="{{ route('dj.dashboard') }}">Panel DJ</a>
            @else
                <a href="{{ route('admin.dashboard') }}">Panel Admin</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" style="width:auto">Wyloguj</button>
            </form>
        @endguest
    </nav>
</header>
<div class="container">
    @if(session('success'))
        <div class="alert ok">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert err">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>
