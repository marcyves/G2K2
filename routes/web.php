<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdministrationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect(route('groups.index'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/administration', AdministrationController::class);
    
    Route::resource('/groups', GroupController::class);
    Route::post('/group/activate', [GroupController::class, 'activate'])->name('groups.activate');
    Route::get('/group/join/{id}', [GroupController::class, 'join'])->name('groups.join');
    Route::get('/group/leave/{id}', [GroupController::class, 'leave'])->name('groups.leave');
    Route::get('/group/grade/{id}', [GroupController::class, 'grade'])->name('groups.grade');

    Route::post('/group/grade/', [GradeController::class, 'store'])->name('grade.store');
    Route::delete('/grade/reset/{id}', [GradeController::class, 'destroy'])->name('grades.destroy');
});

require __DIR__.'/auth.php';
