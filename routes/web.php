<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/students/import', [App\Http\Controllers\StudentController::class, 'import'])->name('students.import');

Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\StudentController::class, 'store'])->name('store');
Route::get('/view/{id}', [App\Http\Controllers\StudentController::class, 'view'])->name('view');
Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('edit');
Route::put('/update', [App\Http\Controllers\StudentController::class, 'update'])->name('update');
Route::any('/items/{id}/delete', [App\Http\Controllers\StudentController::class, 'destroy'])->name('delete');


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

