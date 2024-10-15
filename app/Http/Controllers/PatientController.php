<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the receipts for a specific patient.
     */
    public function showReceipts($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $receipts = $patient->receipts; // Assuming you have a relationship defined in the Patient model
        return view('patients.receipts', compact('patient', 'receipts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'new_patient_name' => 'required|string|max:255',
            // 'new_patient_email' => 'required|email|max:255|unique:patients,email',
            'new_patient_dob' => 'required|date|before:today',
            'jmbg' => 'required_if:patient_id,new|numeric|digits:13',
            'description' => 'required|string',
            // 'amount' => 'required|numeric|min:0',
            'issue_date' => 'required|date|after_or_equal:today',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $patient = new Patient();
        $patient->name = $request->new_patient_name;
        $patient->father_name = $request->new_patient_father_name ?? '';
        $patient->email = $request->new_patient_email ?? '';
        $patient->date_of_birth = $request->new_patient_dob;
        $patient->jmbg = $request->jmbg;
        // $patient->description = $request->input('description');
        // $patient->amount = $request->input('amount');
        // $patient->issue_date = $request->input('issue_date');
        $patient->save();

        Receipt::create([
            'patient_id' => $patient->id,
            'description' => $request->description,
            // 'amount' => $request->input('amount'),
            'issue_date' => $request->issue_date,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
