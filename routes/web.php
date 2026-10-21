<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SubjectController;
use App\Models\Subject;

Route::get('/', function () {
    return redirect()->route('subjects.index');
});

Route::get('/subjects', [SubjectController::class, 'index'])
    ->name('subjects.index');

Route::get('/subjects/create', [SubjectController::class, 'create'])
    ->name('subjects.create');

Route::post('/subjects', [SubjectController::class, 'store'])
    ->name('subjects.store');

Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])
    ->name('subjects.edit');

Route::put('/subjects/{subject}', [SubjectController::class, 'update'])
    ->name('subjects.update');

Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])
    ->name('subjects.destroy');

Route::get('/subjects/{subject}', [SubjectController::class, 'show'])
    ->name('subjects.show');

