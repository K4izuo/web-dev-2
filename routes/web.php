<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/web', function () {
    return view('layouts.StudentView');
});

//View all Students
Route::get('/', [StudentsController::class, 'index'])->name('std.viewAll');

//Create New Students
Route::post('/create-new', [StudentsController::class, 'createNewSTD'])->name('std.create');
Route::put('/update/{id}', [StudentsController::class, 'updateSTD'])->name('std.update');
Route::delete('/delete/{id}', [StudentsController::class, 'deleteSTD'])->name('std.delete');