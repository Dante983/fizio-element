<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceiptController;
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

Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::post('/appointments/request', [AppointmentController::class, 'sendRequest'])->name('appointments.request');


// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [PatientController::class, 'index'])->name('patients.index');

    // Receipt routes
    Route::get('/receipts', [ReceiptController::class, 'index'])->name('receipts.index');
    Route::get('/receipts/create', [ReceiptController::class, 'create'])->name('receipts.create');
    Route::post('/receipts', [ReceiptController::class, 'store'])->name('receipts.store');
    Route::get('/receipts/{receipt}', [ReceiptController::class, 'show'])->name('receipts.show');
    Route::get('/receipts/{receipt}/edit', [ReceiptController::class, 'edit'])->name('receipts.edit');
    Route::put('/receipts/{receipt}', [ReceiptController::class, 'update'])->name('receipts.update');
    Route::delete('/receipts/{receipt}', [ReceiptController::class, 'destroy'])->name('receipts.destroy');

    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/patients/{patient}/receipts', [PatientController::class, 'showReceipts'])->name('patients.receipts');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

    route::resource('appointments', AppointmentController::class);
});
