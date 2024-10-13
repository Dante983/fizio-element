<!-- resources/views/schedule.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zakažite termin</h1>

    <form action="{{ route('appointments.store') }}" method="POST"> <!-- Using route name here -->
        @csrf
        <div class="form-group">
            <label for="name">Ime i prezime</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Preferirani datum termina</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Pitanja ili napomene</label>
            <textarea id="message" name="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Zakaži termin</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection

