@extends('layouts.app')

@section('title', 'Panel DJ | szukamdja.pl')

@section('content')
    <section class="panel" style="margin-bottom:16px;">
        <h1 class="section-title">Panel DJ</h1>
        <p class="section-muted">Zarządzaj strefą działania i monitoruj wszystkie zapytania od klientów.</p>

        <div class="cards">
            <article class="stat">
                <p>Twój kod pocztowy</p>
                <strong>{{ $user->postal_code ?? 'brak' }}</strong>
            </article>
            <article class="stat">
                <p>Promień działania</p>
                <strong>{{ $user->radius_km ?? 0 }} km</strong>
            </article>
            <article class="stat">
                <p>Zapytania w panelu</p>
                <strong>{{ $inquiries->total() }}</strong>
            </article>
        </div>

        <form method="POST" action="{{ route('dj.radius.update') }}" class="grid-2">
            @csrf
            <label class="field">Kod pocztowy DJ
                <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" placeholder="00-000" required>
            </label>
            <label class="field">Promień (km)
                <input type="number" name="radius_km" min="1" max="300" value="{{ old('radius_km', $user->radius_km) }}" required>
            </label>
            <div style="grid-column:1 / -1; display:flex; justify-content:flex-end;">
                <button class="btn" type="submit">Zapisz ustawienia</button>
            </div>
        </form>
    </section>

    <section class="panel">
        <h2 class="section-title" style="font-size:22px;">Moje zapytania</h2>
        <p class="section-muted">Lista leadów przekazanych do Twojego konta.</p>

        <div class="table-wrap">
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
                        <td>
                            <span class="badge">{{ $inquiry->event_type }}</span>
                            @if($inquiry->event_type_other)
                                <span class="badge">{{ $inquiry->event_type_other }}</span>
                            @endif
                        </td>
                        <td>{{ $inquiry->event_date->format('Y-m-d') }}</td>
                        <td>{{ $inquiry->postal_code }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4">Brak zapytań.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $inquiries->links() }}</div>
    </section>
@endsection
