<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient')->whereDate('appointment_time', now()->toDateString())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('appointments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Create appointment
        Appointment::create([
            'patient_name' => $request->input('patient_name'),
            'appointment_time' => Carbon::parse($request->input('date') . ' ' . $request->input('time')),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->route('appointments.index')->with('success', 'Termin je uspešno kreiran.');
    }



    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        return view('appointments.edit', compact('appointment', 'patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
        ]);

        $appointment->update([
            'patient_id' => $request->input('patient_id'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Patient assigned to appointment successfully.');
    }


    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function sendRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Compose email data
        $emailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messageContent' => $request->input('message'),
        ];

        // Send email (to doctor's email)
        Mail::send('emails.appointment_request', $emailData, function ($message) use ($emailData) {
            $message->to(config('mail.admin_email')) // Doctor's email
                ->subject($emailData['subject']);
        });

        return back()->with('success', 'Vaša poruka je uspešno poslata.');
    }
}
