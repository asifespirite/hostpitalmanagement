<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PermissionController;


Route::get('/', function () {
    if (Auth::check()) {
        return view('dashboard');
    }
    return redirect()->route('login');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::put('/permission/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::get('permission/list', [PermissionController::class, 'list'])->name('permission.list');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctors/assign/{id}', [DoctorController::class, 'assignDoctor'])->name('doctor.assign');
});







/* Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
}); */
