
<!-- resources/views/appointments/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assign Patient to Appointment</h2>

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="patient_id">Assign Patient</label>
            <select name="patient_id" id="patient_id" class="form-control">
                <option value="">Select a Patient</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign</button>
    </form>
</div>
@endsection
