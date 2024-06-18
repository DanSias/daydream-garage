<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Save;

use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Search cars by make & model
Route::get('/cars/{make?}/{model?}', function ($make, $model = '') {
    // $userId = Auth::id();
    // $userSaves = Save::where('user_id', $userId)->get();
    return Inertia::render('Cars', [
        'makeProp' => $make, 
        'modelProp' => $model,
        // 'saves' => $userSaves
    ]);
})->name('cars');

// View saved cars
Route::get('/saved', function () {
    return Inertia::render('Saved', [
        'savedAll' => Save::all(),
        'savedMine' => Save::where('user_id', Auth::id())->where('type', 'save')->get(),
        'ignored' =>  Save::where('user_id', Auth::id())->where('type', 'ignore')->get()
    ]);
})->name('saved');

Route::get('/search', [SearchController::class, 'getCars'])->name('search');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

