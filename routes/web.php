<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
// About Me page route
Route::get('/about', function () {
    return view('about'); // Points to resources/views/about.blade.php
});

// Our Services page route
Route::get('/services', function () {
    return view('services'); // Points to resources/views/services.blade.php
});

// Schedule an Appointment page route
Route::get('/schedule', function () {
    return view('schedule'); // Points to resources/views/schedule.blade.php
});

// Route for handling the form submission (POST request)
Route::post('/appointments/store', function (Illuminate\Http\Request $request) {
    // Handle form submission logic (e.g., validation, saving to DB, etc.)

    // For now, just return a success message
    return back()->with('success', 'Vaš termin je uspešno zakazan!');
})->name('appointments.store');
