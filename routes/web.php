<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthContext;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('pages.admin_form');
});

//Auth
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth-login', [AuthController::class, 'userLogin'])->name('auth.userLogin');

//Middleware
Route::middleware([AuthContext::class])->group(function () {
  Route::get('/students', [StudentsController::class, 'index'])->name('std.viewAll');
  Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

  //Create New Students
  Route::post('/create-new', [StudentsController::class, 'createNewSTD'])->name('std.create');
  Route::put('/update/{id}', [StudentsController::class, 'updateSTD'])->name('std.update');
  Route::delete('/delete/{id}', [StudentsController::class, 'deleteSTD'])->name('std.delete');
});
