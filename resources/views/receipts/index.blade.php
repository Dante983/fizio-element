@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista računa</h2>
    <a href="{{ route('receipts.create') }}" class="btn btn-primary mb-3">Kreiraj novi račun</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table custom-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pacijent</th>
                <th>Opis</th>
                <th>Datum izdavanja</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipts as $receipt)
            <tr>
                <td>{{ $receipt->id }}</td>
                <td>{{ $receipt->patient->name }}</td>
                <td>{{ $receipt->description }}</td>
                <td>{{ $receipt->issue_date }}</td>
                <td>
                    <a href="{{ route('receipts.show', $receipt) }}" class="btn btn-sm btn-info">Prikaži</a>
                    <a href="{{ route('receipts.edit', $receipt) }}" class="btn btn-sm btn-warning">Izmeni</a>
                    <form action="{{ route('receipts.destroy', $receipt) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni?')">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $receipts->links() }}
</div>
@endsection
