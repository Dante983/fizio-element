@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Prijava</h2>
    <form method="POST" action="{{ route('login') }}" class="form">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Lozinka</label>
            <input id="password" type="password" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Prijavi se</button>
        </div>
    </form>
</div>
@endsection
