@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kreiraj termin za pacijenta</h2>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="patient_name">Ime pacijenta</label>
            <input type="text" id="patient_name" name="patient_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Datum termina</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="time">Vreme termina</label>
            <input type="time" id="time" name="time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="notes">Napomene</label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kreiraj termin</button>
    </form>
</div>
@endsection

