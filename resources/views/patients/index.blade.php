@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Doctor's Dashboard</h2>

        <!-- Today's Appointments Section -->
        <div class="mb-5">
           <h2>Scheduled Appointments</h2>
            @if($appointments->isEmpty())
                <p>No appointments scheduled.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Appointment Date</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->notes }}</td>
                            <td>
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-info">Assign Patient</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <!-- Patient List Section -->
        <h2>Patient List</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('patients.index') }}" class="form-inline mb-3">
            <div class="form-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name or JMBG"
                    value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>JMBG</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td><a href="{{ route('patients.receipts', $patient->id) }}">{{ $patient->name }}</a></td>
                        <td>{{ $patient->jmbg }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->date_of_birth }}</td>
                        <td>
                            <a href="{{ route('patients.receipts', $patient->id) }}" class="btn btn-sm btn-info">View
                                Receipts</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $patients->links() }}
        <a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
    </div>
@endsection
