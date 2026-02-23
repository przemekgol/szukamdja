@extends('layouts.app')

@section('title', 'Znajdź DJ-a | szukamdja.pl')

@section('content')
    <section class="hero">
        <h1>Nowoczesny booking DJ na Twoją imprezę.</h1>
        <p>W klimacie premium: szybko wysyłasz zapytanie, a dostępni DJ-e z Twojej okolicy dostają je od razu do panelu i mogą się z Tobą kontaktować.</p>
    </section>

    <section class="panel">
        <h2 class="section-title">Formularz zapytania klienta</h2>
        <p class="section-muted">Nie zakładasz konta. Podaj tylko e-mail, typ wydarzenia, datę i kod pocztowy.</p>

        <form method="POST" action="{{ route('inquiry.store') }}" class="grid-2">
            @csrf

            <label class="field">Adres e-mail
                <input type="email" name="client_email" value="{{ old('client_email') }}" required>
            </label>

            <label class="field">Typ imprezy
                <select name="event_type" required>
                    <option value="">-- wybierz --</option>
                    <option value="urodziny" @selected(old('event_type') === 'urodziny')>Urodziny</option>
                    <option value="wesele" @selected(old('event_type') === 'wesele')>Wesele</option>
                    <option value="event" @selected(old('event_type') === 'event')>Event</option>
                    <option value="inne" @selected(old('event_type') === 'inne')>Inne</option>
                </select>
            </label>

            <label class="field">Inny typ imprezy (opcjonalnie)
                <input type="text" name="event_type_other" value="{{ old('event_type_other') }}" placeholder="Np. impreza firmowa">
            </label>

            <label class="field">Data imprezy
                <input type="date" name="event_date" value="{{ old('event_date') }}" required>
            </label>

            <label class="field" style="grid-column: 1 / -1;">Kod pocztowy miejsca imprezy
                <input type="text" name="postal_code" placeholder="00-000" value="{{ old('postal_code') }}" required>
            </label>

            <div style="grid-column: 1 / -1; display:flex; justify-content:flex-end;">
                <button class="btn" type="submit">Wyślij zapytanie do DJ-ów</button>
            </div>
        </form>
    </section>
@endsection
