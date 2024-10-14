@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dobrodošli, Dr. Miroslav</h2>
    <h3>Lista pacijenata:</h3>
    <ul>
        <li>Pacijent 1</li>
        <li>Pacijent 2</li>
        <li>Pacijent 3</li>
        <!-- Add more patients or fetch from database -->
    </ul>
    <a href="{{ route('receipts.create') }}" class="btn btn-primary">Create New Receipt</a>
</div>
@endsection
