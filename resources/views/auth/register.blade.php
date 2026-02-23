@extends('layouts.app')

@section('title', 'Rejestracja DJ | szukamdja.pl')

@section('content')
    <section class="hero">
        <h1>Dołącz jako DJ</h1>
        <p>Stwórz profil i ustaw promień działania. Klienci wysyłający zapytania w Twoim obszarze zobaczą Cię automatycznie.</p>
    </section>

    <section class="panel">
        <h2 class="section-title">Rejestracja konta DJ</h2>
        <p class="section-muted">Po rejestracji od razu trafisz do panelu i zaczniesz otrzymywać zapytania.</p>

        <form method="POST" action="{{ route('register.store') }}" class="grid-2">
            @csrf

            <label class="field">Nazwa DJ / Imię
                <input type="text" name="name" value="{{ old('name') }}" required>
            </label>

            <label class="field">E-mail
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>

            <label class="field">Hasło
                <input type="password" name="password" required>
            </label>

            <label class="field">Powtórz hasło
                <input type="password" name="password_confirmation" required>
            </label>

            <label class="field">Kod pocztowy bazowy
                <input type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="00-000" required>
            </label>

            <label class="field">Promień przyjmowania zapytań (km)
                <input type="number" name="radius_km" min="1" max="300" value="{{ old('radius_km') }}" required>
            </label>

            <div style="grid-column:1 / -1; display:flex; justify-content:flex-end;">
                <button class="btn" type="submit">Załóż konto DJ</button>
            </div>
        </form>
    </section>
@endsection
