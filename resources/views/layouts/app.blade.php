<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'szukamdja.pl')</title>
    <style>
        :root {
            --bg: #06070b;
            --bg-soft: #0d1018;
            --card: rgba(255,255,255,0.06);
            --card-border: rgba(255,255,255,0.12);
            --text: #f3f6ff;
            --muted: #a4aec7;
            --primary: #6ea8fe;
            --primary-2: #8b5cf6;
            --success: #3ddc97;
            --danger: #ff6b8a;
            --radius: 20px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: var(--text);
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(1200px 800px at 10% -10%, rgba(110,168,254,0.23), transparent 55%),
                radial-gradient(1200px 700px at 90% -20%, rgba(139,92,246,0.20), transparent 55%),
                var(--bg);
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }

        .shell {
            max-width: 1120px;
            margin: 0 auto;
            padding: 24px 18px 42px;
        }

        .nav {
            position: sticky;
            top: 14px;
            z-index: 20;
            backdrop-filter: blur(22px);
            border: 1px solid var(--card-border);
            background: linear-gradient(130deg, rgba(255,255,255,0.11), rgba(255,255,255,0.04));
            border-radius: 18px;
            padding: 12px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 26px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            letter-spacing: .2px;
        }

        .logo-mark {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #04050a;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .chip, .chip-btn {
            border: 1px solid rgba(255,255,255,0.15);
            color: var(--text);
            background: rgba(255,255,255,0.04);
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 14px;
            transition: .2s ease;
        }

        .chip:hover, .chip-btn:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-1px);
        }

        .chip-btn { cursor: pointer; }

        .hero {
            margin-bottom: 18px;
            border-radius: var(--radius);
            border: 1px solid var(--card-border);
            padding: 28px;
            background: linear-gradient(150deg, rgba(18,24,36,.92), rgba(10,13,20,.82));
            box-shadow: 0 20px 45px rgba(0,0,0,.35);
        }

        .hero h1 {
            margin: 0 0 12px;
            line-height: 1.1;
            font-size: clamp(30px, 5vw, 52px);
            letter-spacing: -.02em;
        }

        .hero p {
            margin: 0;
            color: var(--muted);
            max-width: 730px;
            font-size: 17px;
        }

        .panel {
            border: 1px solid var(--card-border);
            border-radius: var(--radius);
            padding: 22px;
            background: linear-gradient(135deg, rgba(255,255,255,.09), rgba(255,255,255,.03));
            backdrop-filter: blur(14px);
        }

        .section-title {
            margin: 0 0 6px;
            font-size: 28px;
            letter-spacing: -.01em;
        }

        .section-muted {
            margin: 0 0 22px;
            color: var(--muted);
            font-size: 15px;
        }

        .grid-2 {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 13px;
            color: var(--muted);
        }

        .field input,
        .field select {
            width: 100%;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.16);
            background: rgba(8,10,16,0.65);
            color: var(--text);
            padding: 11px 12px;
            outline: none;
        }

        .field input:focus,
        .field select:focus {
            border-color: rgba(110,168,254,.95);
            box-shadow: 0 0 0 4px rgba(110,168,254,.2);
        }

        .btn {
            border: 0;
            cursor: pointer;
            border-radius: 12px;
            padding: 12px 16px;
            color: #06070b;
            font-weight: 700;
            background: linear-gradient(135deg, #9ac2ff, #9f88ff);
            transition: .18s ease;
        }

        .btn:hover { transform: translateY(-1px); }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-bottom: 16px;
        }

        .stat {
            border: 1px solid rgba(255,255,255,0.14);
            border-radius: 14px;
            background: rgba(255,255,255,0.03);
            padding: 14px;
        }

        .stat p { margin: 0; color: var(--muted); font-size: 12px; text-transform: uppercase; letter-spacing: .08em; }
        .stat strong { display: block; margin-top: 6px; font-size: 24px; }

        .table-wrap {
            overflow: auto;
            border-radius: 14px;
            border: 1px solid rgba(255,255,255,0.12);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            text-align: left;
            font-size: 14px;
        }

        th {
            color: var(--muted);
            font-weight: 600;
            background: rgba(255,255,255,0.03);
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 12px;
            border: 1px solid rgba(255,255,255,0.16);
            background: rgba(255,255,255,0.05);
        }

        .alert {
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 16px;
            border: 1px solid transparent;
            font-size: 14px;
        }

        .ok { background: rgba(61,220,151,0.12); border-color: rgba(61,220,151,.5); }
        .err { background: rgba(255,107,138,0.12); border-color: rgba(255,107,138,.45); }

        .pagination-wrap { margin-top: 12px; }

        @media (max-width: 900px) {
            .grid-2, .cards { grid-template-columns: 1fr; }
            .hero { padding: 22px; }
        }
    </style>
</head>
<body>
<div class="shell">
    <header class="nav">
        <a class="logo" href="{{ route('inquiry.create') }}">
            <span class="logo-mark">DJ</span>
            <span>szukamdja.pl</span>
        </a>
        <div class="nav-links">
            <a class="chip" href="{{ route('inquiry.create') }}">Zapytanie</a>
            @guest
                <a class="chip" href="{{ route('login') }}">Logowanie</a>
                <a class="chip" href="{{ route('register') }}">Dołącz jako DJ</a>
            @else
                @if(auth()->user()->role === 'dj')
                    <a class="chip" href="{{ route('dj.dashboard') }}">Panel DJ</a>
                @else
                    <a class="chip" href="{{ route('admin.dashboard') }}">Panel Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button class="chip-btn" type="submit">Wyloguj</button>
                </form>
            @endguest
        </div>
    </header>

    @if(session('success'))
        <div class="alert ok">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert err">
            <ul style="margin:0; padding-left: 20px;">
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
