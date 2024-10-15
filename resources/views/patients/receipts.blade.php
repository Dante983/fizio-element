@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Računi za pacijenta: {{ $patient->name }}</h2>
    <table class="table custom-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Opis</th>
                <th>Iznos</th>
                <th>Datum izdavanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->id }}</td>
                    <td>{{ $receipt->description }}</td>
                    <td>{{ $receipt->amount }}</td>
                    <td>{{ $receipt->issue_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients List</a>
</div>
@endsection
