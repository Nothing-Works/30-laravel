<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

//Route::controller(JobController::class)->group(function () {
//    Route::get('/jobs', 'index');
//    Route::post('/jobs', 'store');
//    Route::get('/jobs/create', 'create');
//    Route::get('/jobs/{job}', 'show');
//    Route::patch('/jobs/{job}', 'update');
//    Route::delete('/jobs/{job}', 'destroy');
//    Route::get('/jobs/{job}/edit', 'edit');
//});

Route::resource('jobs', JobController::class);
