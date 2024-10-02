<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/will-come', [\App\Http\Controllers\HomeController::class, 'submitWillComeWedding'])->name('will-come.post');
