<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Job_vacancy_Controller;
use App\Http\Controllers\ValidationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/v1')->group(function () {

    Route::prefix('/auth')->group(function () {

        Route::post('/login' , [AuthController::class , 'index']);

        Route::post('/logout' , [AuthController::class , 'destroy']);

    });

    Route::post('/validation' ,[ ValidationsController::class , 'store'] );

    Route::get('/validations' ,[ ValidationsController::class , 'show'] );

    Route::get('/job_vacancies', [ Job_vacancy_Controller::class , 'show']);

    Route::get('/job_vacancies/{id}', [ Job_vacancy_Controller::class , 'details']);
});

Route::middleware(['auth', 'second'])->group(function () {

});
