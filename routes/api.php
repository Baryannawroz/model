<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Faculty;


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


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('logout', [UserController::class, 'logout']);

    Route::get('Faculties', [FacultyController::class, 'index']);
    Route::post('Faculty', [FacultyController::class, 'store']);
    Route::put('Faculty/{faculty}', [FacultyController::class, 'update']);
    Route::delete('Faculty/{faculty}', [FacultyController::class, 'destroy']);

    Route::get('stages', [StageController::class, 'index']);
    Route::post('stage', [StageController::class, 'store']);
    Route::put('stage/{Stage}', [StageController::class, 'update']);
    Route::delete('stage/{Stage}', [StageController::class, 'destroy']);

    Route::get('subjects', [SubjectController::class, 'index']);
    Route::post('subject', [SubjectController::class, 'store']);
    Route::put('subject/{Subject}', [SubjectController::class, 'update']);
    Route::delete('subject/{Subject}', [SubjectController::class, 'destroy']);
});
