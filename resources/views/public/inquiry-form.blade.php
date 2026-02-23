@extends('layouts.app')

@section('title', 'Zapytanie o DJ')

@section('content')
    <h1>Znajdź DJ-a na swoją imprezę</h1>
    <p>Nie musisz mieć konta – wyślij zapytanie i czekaj na kontakt od DJ-ów.</p>

    <form method="POST" action="{{ route('inquiry.store') }}" class="grid">
        @csrf
        <label>E-mail klienta
            <input type="email" name="client_email" value="{{ old('client_email') }}" required>
        </label>
        <label>Typ imprezy
            <select name="event_type" required>
                <option value="">-- wybierz --</option>
                <option value="urodziny">Urodziny</option>
                <option value="wesele">Wesele</option>
                <option value="event">Event</option>
                <option value="inne">Inne</option>
            </select>
        </label>
        <label>Inny typ imprezy (opcjonalnie)
            <input type="text" name="event_type_other" value="{{ old('event_type_other') }}">
        </label>
        <label>Data imprezy
            <input type="date" name="event_date" value="{{ old('event_date') }}" required>
        </label>
        <label>Kod pocztowy imprezy
            <input type="text" name="postal_code" placeholder="00-000" value="{{ old('postal_code') }}" required>
        </label>
        <button type="submit">Wyślij zapytanie</button>
    </form>
@endsection
