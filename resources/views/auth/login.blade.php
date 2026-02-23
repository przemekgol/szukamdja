@extends('layouts.app')

@section('title', 'Logowanie DJ/Admin | szukamdja.pl')

@section('content')
    <section class="panel" style="max-width:560px; margin: 0 auto;">
        <h1 class="section-title">Logowanie</h1>
        <p class="section-muted">Zaloguj się jako DJ lub administrator.</p>

        <form method="POST" action="{{ route('login.attempt') }}" class="grid-2">
            @csrf
            <label class="field" style="grid-column: 1 / -1;">E-mail
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>

            <label class="field" style="grid-column: 1 / -1;">Hasło
                <input type="password" name="password" required>
            </label>

            <div style="grid-column: 1 / -1; display:flex; justify-content:flex-end;">
                <button class="btn" type="submit">Zaloguj</button>
            </div>
        </form>
    </section>
@endsection
