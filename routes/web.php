<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::redirect('/', '/login'); // Redirect '/' to '/login'

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\StudentController::class, 'index'])->name('dashboard');

Route::get('/exportPdf', [App\Http\Controllers\StudentController::class, 'exportPdf'])->name('exportPdf');

Route::get('/students/import', [App\Http\Controllers\StudentController::class, 'showImportForm'])->name('students.import.form');
Route::post('/students/import', [App\Http\Controllers\StudentController::class, 'import'])->name('students.import');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
