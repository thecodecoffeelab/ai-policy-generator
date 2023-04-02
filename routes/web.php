<?php

declare(strict_types=1);
use App\Http\Controllers\ProfileGeneratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::view('/', 'profile_generators.create');

Route::post('/generate-policy', ProfileGeneratorController::class)->name('generate-policy');


/* Route::get('/generate-policy', 'ProfileGeneratorController@index');
Route::post('/generate-policy', 'ProfileGeneratorController@store'); */

//Route::post('/form/submit', [ProfileGeneratorController::class, 'store'])->name('form.submit');

/* 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout'); */