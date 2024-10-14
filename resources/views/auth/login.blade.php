@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Prijava</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div>
            <label for="password">Lozinka</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Prijavi se</button>
        </div>
    </form>
</div>
@endsection
