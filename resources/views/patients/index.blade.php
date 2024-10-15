@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista pacijenata</h2>
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Ime I Prezime</th>
                    <th>JMBG</th>
                    <th>Email</th>
                    <th>Datum rođenja</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td><a href="{{ route('patients.receipts', $patient->id) }}">{{ $patient->name }}</a></td>
                        <td>{{ $patient->jmbg }}</a></td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->date_of_birth }}</td>
                        <td>
                            <a href="{{ route('patients.receipts', $patient->id) }}" class="btn btn-sm btn-info">Prikaži
                                račune</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('patients.create') }}" class="btn btn-primary">Dodaj novog pacijenta</a>
    </div>
@endsection
