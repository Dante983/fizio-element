
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kreiraj novi račun</h2>

    @if($errors)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors as $error)
                    @if(is_array($error))
                        @foreach($error as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @else
                        <li>{{ $error }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        <div class="form-group">
            <label for="new_patient_name">Ime</label>
            <input type="text" name="new_patient_name" id="new_patient_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="new_patient_father_name">Ime Oca</label>
            <input type="text" name="new_patient_father_name" id="new_patient_father_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="jmbg">JMBG</label>
            <input type="number" name="jmbg" id="jmbg" class="form-control">
        </div>
        <div class="form-group">
            <label for="new_patient_email">Email</label>
            <input type="email" name="new_patient_email" id="new_patient_email" class="form-control">
        </div>
        <div class="form-group">
            <label for="new_patient_dob">Datum rođenja</label>
            <input type="date" name="new_patient_dob" id="new_patient_dob" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Opis</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <!-- <div class="form-group"> -->
        <!--     <label for="amount">Iznos</label> -->
        <!--     <input type="number" name="amount" id="amount" class="form-control" step="0.01" required> -->
        <!-- </div> -->
        <div class="form-group">
            <label for="issue_date">Datum izdavanja</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj pacijenta</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('issue_date').value = today;
    });
</script>

@endsection
