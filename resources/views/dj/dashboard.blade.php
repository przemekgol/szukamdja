@extends('layouts.app')

@section('title', 'Panel DJ')

@section('content')
    <h1>Panel DJ</h1>
    <p>Ustaw promień zleceń, aby otrzymywać zapytania.</p>

    <form method="POST" action="{{ route('dj.radius.update') }}" class="grid" style="margin-bottom: 20px;">
        @csrf
        <label>Kod pocztowy DJ
            <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" required>
        </label>
        <label>Promień (km)
            <input type="number" name="radius_km" min="1" max="300" value="{{ old('radius_km', $user->radius_km) }}" required>
        </label>
        <button type="submit">Zapisz ustawienia</button>
    </form>

    <h2>Moje zapytania</h2>
    <table>
        <thead>
        <tr>
            <th>E-mail klienta</th>
            <th>Typ imprezy</th>
            <th>Data</th>
            <th>Kod pocztowy</th>
        </tr>
        </thead>
        <tbody>
        @forelse($inquiries as $inquiry)
            <tr>
                <td>{{ $inquiry->client_email }}</td>
                <td>{{ $inquiry->event_type }} {{ $inquiry->event_type_other }}</td>
                <td>{{ $inquiry->event_date->format('Y-m-d') }}</td>
                <td>{{ $inquiry->postal_code }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Brak zapytań.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $inquiries->links() }}
@endsection
