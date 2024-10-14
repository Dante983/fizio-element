<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipts = Receipt::with('patient')->latest()->paginate(10);
        return view('receipts.index', compact('receipts'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('receipts.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $errors = [];

        try {
            if ($request->patient_id === 'new') {
                $validatedData = $request->validate([
                    'new_patient_name' => 'required_if:patient_id,new|string|max:255',
                    'new_patient_email' => 'required_if:patient_id,new|email|unique:patients,email',
                    'new_patient_dob' => 'required_if:patient_id,new|date',
                    'description' => 'required',
                    'amount' => 'required|numeric',
                    'issue_date' => 'required|date',
                ]);

                $patient = Patient::create([
                    'name' => $request->new_patient_name,
                    'email' => $request->new_patient_email,
                    'date_of_birth' => $request->new_patient_dob,
                ]);

                $validatedData['patient_id'] = $patient->id;
            } else {
                $validatedData = $request->validate([
                    'patient_id' => 'exists:patients,id',
                    'description' => 'required',
                    'amount' => 'required|numeric',
                    'issue_date' => 'required|date',
                ]);
                $patient = Patient::findOrFail($validatedData['patient_id']);

                $validatedData['patient_id'] = $patient->id;
            }

            Receipt::create([
                'patient_id' => $validatedData['patient_id'],
                'description' => $validatedData['description'],
                'amount' => $validatedData['amount'],
                'issue_date' => $validatedData['issue_date'],
            ]);

            return redirect()->route('receipts.index')->with('success', 'Račun je uspešno kreiran.');
        } catch (ValidationException $e) {
            return $e->errors();
        } catch (\Exception $e) {
            return  ['error' => 'Došlo je do greške: ' . $e->getMessage()];
        }

        // return view('receipts.create', compact('errors'))->withInput();
    }

    public function show(Receipt $receipt)
    {
        return view('receipts.show', compact('receipts'));
    }

    public function edit(Receipt $receipt)
    {
        $patients = Patient::all();
        return view('receipts.edit', compact('receipt', 'patients'));
    }

    public function update(Request $request, Receipt $receipt)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required',
            'amount' => 'required|numeric',
            'issue_date' => 'required|date',
        ]);

        $receipt->update($validatedData);

        return redirect()->route('receipts.index')->with('success', 'Račun je uspešno ažuriran.');
    }

    public function destroy(Receipt $receipt)
    {
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'Račun je uspešno obrisan.');
    }
}
