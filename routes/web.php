<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

// Display all subjects
Route::get('/subjects', [SubjectController::class, 'index'])
    ->name('subjects.index');

// Create subject form
Route::get('/subjects/create', [SubjectController::class, 'create'])
    ->name('subjects.create');

// Save new subject
Route::post('/subjects', [SubjectController::class, 'store'])
    ->name('subjects.store');

// Featured subject — place before /subjects/{id}
Route::get('/subjects/featured', [SubjectController::class, 'featured'])
    ->name('subjects.featured');

// Display one subject
Route::get('/subjects/{id}', [SubjectController::class, 'show'])
    ->whereNumber('id')
    ->name('subjects.show');

// Edit subject form
Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])
    ->whereNumber('id')
    ->name('subjects.edit');

// Update subject
Route::put('/subjects/{id}', [SubjectController::class, 'update'])
    ->whereNumber('id')
    ->name('subjects.update');

// Delete subject
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])
    ->whereNumber('id')
    ->name('subjects.destroy');
