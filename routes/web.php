<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;


Route::get('/subjects/featured', [SubjectController::class, 'featured'])
    ->name('subjects.featured');


Route::get('/subjects/filter/{units?}', function ($units = null) {
    if ($units) {
        return redirect()->route('subjects.index', [
            'units' => $units
        ]);
    }

    return redirect()->route('subjects.index');
});


Route::resource('subjects', SubjectController::class)
    ->only(['index', 'show']);