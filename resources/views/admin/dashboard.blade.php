@extends('layouts.app')

@section('title', 'Panel Admin')

@section('content')
    <h1>Panel administratora</h1>
    <p>Podgląd wszystkich zapytań w systemie.</p>

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
                <td>{{ $inquiry->event_type }} {{ $inquiry->event_type_other }}</td>
                <td>{{ $inquiry->event_date->format('Y-m-d') }}</td>
                <td>{{ $inquiry->postal_code }}</td>
                <td>{{ $inquiry->djs_count }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Brak zapytań.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $inquiries->links() }}
@endsection
