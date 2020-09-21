<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

// Route::get('/', [MainController::class, 'index']);
Route::get('/', [AuthController::class, 'index']);
