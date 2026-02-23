@extends('layouts.app')

@section('title', 'Logowanie')

@section('content')
    <h1>Logowanie</h1>
    <form method="POST" action="{{ route('login.attempt') }}" class="grid">
        @csrf
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <button type="submit">Zaloguj</button>
    </form>
@endsection
