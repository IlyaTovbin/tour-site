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
    Route::resource('/blog', 'App\Http\Controllers\content\BlogController');
    Route::resource('/faq', 'App\Http\Controllers\content\FaqController');
    Route::resource('/categories', 'App\Http\Controllers\content\CategoryController');
    
    Route::resource('/schedule-clients', 'App\Http\Controllers\clients\ScheduleClientsController');
    Route::get('ajaxRequest/schedule-clients', 'App\Http\Controllers\clients\ScheduleClientsController@ajaxRequest');

    Route::resource('/contacts', 'App\Http\Controllers\clients\ContactClientsController');
    Route::get('ajaxRequest/contacts', 'App\Http\Controllers\clients\ContactClientsController@ajaxRequest');

    Route::get('ajaxRequest/blog', 'App\Http\Controllers\content\BlogController@ajaxRequest');
    Route::post('ajaxRequest/blog', 'App\Http\Controllers\content\BlogController@ajaxRequest');

    Route::get('ajaxRequest/tour', 'App\Http\Controllers\content\ToursController@ajaxRequest');
    Route::post('ajaxRequest/tour', 'App\Http\Controllers\content\ToursController@ajaxRequest');

    Route::get('ajaxRequest/schedule', 'App\Http\Controllers\content\ScheduleController@ajaxRequest');
    Route::post('ajaxRequest/schedule', 'App\Http\Controllers\content\ScheduleController@ajaxRequest');

    Route::get('ajaxRequest/category', 'App\Http\Controllers\content\CategoryController@ajaxRequest');
    Route::get('ajaxRequest/faq', 'App\Http\Controllers\content\FaqController@ajaxRequest');

});
