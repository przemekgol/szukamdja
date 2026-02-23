@extends('layouts.app')

@section('title', 'Panel Admin | szukamdja.pl')

@section('content')
    <section class="panel" style="margin-bottom:16px;">
        <h1 class="section-title">Panel administratora</h1>
        <p class="section-muted">Pełny podgląd aktywności portalu i wszystkich zapytań klientów.</p>

        <div class="cards" style="grid-template-columns: repeat(2, minmax(0,1fr));">
            <article class="stat">
                <p>Łącznie zapytań</p>
                <strong>{{ $inquiries->total() }}</strong>
            </article>
            <article class="stat">
                <p>Elementów na stronie</p>
                <strong>{{ $inquiries->count() }}</strong>
            </article>
        </div>
    </section>

    <section class="panel">
        <h2 class="section-title" style="font-size:22px;">Wszystkie zapytania</h2>
        <p class="section-muted">Administrator widzi każde zgłoszenie wraz z liczbą dopasowanych DJ-ów.</p>

        <div class="table-wrap">
            <table>
                <thead>
                <tr>
                    <th>E-mail klienta</th>
                    <th>Typ imprezy</th>
                    <th>Data</th>
                    <th>Kod pocztowy</th>
                    <th>Liczba przypisanych DJ</th>
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
                        <td>{{ $inquiry->djs_count }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5">Brak zapytań.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $inquiries->links() }}</div>
    </section>
@endsection
