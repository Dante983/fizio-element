<!-- resources/views/schedule.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Postavite pitanje ili zatražite termin</h1>

    <form action="{{ route('appointments.request') }}" method="POST">
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
            <label for="subject">Naslov</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Pitanje ili zahtev za termin</label>
            <textarea id="message" name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Pošalji</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection

