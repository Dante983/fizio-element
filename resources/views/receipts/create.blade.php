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

    <form method="POST" action="{{ route('receipts.store') }}">
        @csrf
        <div class="form-group">
            <label for="patient_select">Pacijent</label>
            <select name="patient_id" id="patient_select" class="form-control">
                <option value="" disabled selected>Izaberite pacijenta ili dodajte novog</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
                <option value="new">Dodaj novog pacijenta</option>
            </select>
        </div>

        <div id="new_patient_fields" style="display: none;">
            <div class="form-group">
                <label for="new_patient_name">Ime novog pacijenta</label>
                <input type="text" name="new_patient_name" id="new_patient_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="new_patient_email">Email novog pacijenta</label>
                <input type="email" name="new_patient_email" id="new_patient_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="new_patient_dob">Datum rođenja novog pacijenta</label>
                <input type="date" name="new_patient_dob" id="new_patient_dob" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="amount">Iznos</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="issue_date">Datum izdavanja</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Kreiraj račun</button>
    </form>
</div>

<script>
document.getElementById('patient_select').addEventListener('change', function() {
    var newPatientFields = document.getElementById('new_patient_fields');
    if (this.value === 'new') {
        newPatientFields.style.display = 'block';
    } else {
        newPatientFields.style.display = 'none';
    }
});
</script>
@endsection
