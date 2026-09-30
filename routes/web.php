<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/featured', [SubjectController::class, 'featured'])->name('subjects.featured');
Route::get('/subjects/{id}', [SubjectController::class, 'show'])->name('subjects.show');

Route::resource('subjects', SubjectController::class)
    ->only(['index', 'show', 'create', 'store']);