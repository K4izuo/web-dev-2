<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthContext;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
  if (Session::has('loginId')) {
      return redirect()->route('std.viewAll');
  }
  return view('auth.login');
});

//Login
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth-login', [AuthController::class, 'userLogin'])->name('auth.userLogin');

//Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth-registeer', [AuthController::class, 'userRegister'])->name('auth.userRegister');

//Middleware
Route::middleware([AuthContext::class])->group(function () {
  Route::get('/students', [StudentsController::class, 'index'])->name('std.viewAll');
  Route::get('/logout', [AuthController::class, 'userLogout'])->name('auth.logout');

  //Create New Students
  Route::post('/create-new', [StudentsController::class, 'createNewSTD'])->name('std.create');
  Route::put('/update/{id}', [StudentsController::class, 'updateSTD'])->name('std.update');
  Route::delete('/delete/{id}', [StudentsController::class, 'deleteSTD'])->name('std.delete');
});
