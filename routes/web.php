<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'postLogin']);

Route::middleware(['login_guard'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index']);
    Route::get('/logout', [MainController::class, 'logout']);
    Route::resource('/schedule', 'App\Http\Controllers\content\ScheduleController');
    Route::resource('/tours', 'App\Http\Controllers\content\ToursController');
    Route::resource('/vir-tours', 'App\Http\Controllers\content\VirtourController');
    Route::get('ajaxRequest/blog', 'App\Http\Controllers\content\BlogController@ajaxRequest');
    Route::resource('/blog', 'App\Http\Controllers\content\BlogController');
    Route::resource('/faq', 'App\Http\Controllers\content\FaqController');
});
