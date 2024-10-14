@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista pacijenata</h2>
    <ul>
        @foreach($patients as $patient)
            <li>
                <a href="{{ route('patients.receipts', $patient->id) }}">{{ $patient->name }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('receipts.create') }}" class="btn btn-primary">Create New Receipt</a>
</div>
@endsection
