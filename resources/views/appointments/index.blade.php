@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Today's Appointments</h2>
        @if ($appointments->isEmpty())
            <p>No appointments for today.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Time</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->patient->name }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->notes }}</td>
                            <td>
                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add New Appointment</a>
    </div>
@endsection
