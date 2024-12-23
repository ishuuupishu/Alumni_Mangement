<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumniController; // Include the AlumniController
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Register web routes for your application.
| These routes use Inertia.js for rendering Vue.js components.
|--------------------------------------------------------------------------
*/

// Root route (redirect to Dashboard or Welcome page)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('welcome');

// Dashboard route (requires authentication)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Alumni management routes (Inertia-powered views)
Route::middleware('auth')->group(function () {
    Route::get('/create', function () {
        return Inertia::render('CreateAlumni');
    })->name('create.alumni');

    Route::get('/edit/{id}', function ($id) {
        return Inertia::render('EditAlumni', ['id' => $id]);
    })->name('edit.alumni');

    Route::get('/profile/{id}', function ($id) {
        return Inertia::render('AlumniProfile', ['id' => $id]);
    })->name('profile.alumni');
});

// Include authentication routes
require __DIR__.'/auth.php';
