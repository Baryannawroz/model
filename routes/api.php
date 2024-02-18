<?php

use App\Http\Controllers\DeliveryPlanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelInfoController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SubjectContentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\DeliveryPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Faculty;
use App\Models\Subject_content;

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

// Route::group(['middleware' => 'auth:sanctum'], function () {
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

    Route::get('subjectcontents', [SubjectContentController::class, 'index']);
    Route::post('subjectcontent', [SubjectContentController::class, 'store']);
    Route::put('subjectcontent/{SubjectContent}', [SubjectContentController::class, 'update']);
    Route::delete('subjectcontent/{SubjectContent}', [SubjectContentController::class, 'destroy']);

    Route::get('modelinfos', [ModelInfoController::class, 'index']);
    Route::post('modelinfo', [ModelInfoController::class, 'store']);
    Route::put('modelinfo/{ModelInfo}', [ModelInfoController::class, 'update']);
    Route::delete('modelinfo/{ModelInfo}', [ModelInfoController::class, 'destroy']);

    Route::get('deliveryplans', [DeliveryPlanController::class, 'index']);
    Route::post('deliveryplan', [DeliveryPlanController::class, 'store']);
    Route::put('deliveryplan/{ModelInfo}', [DeliveryPlanController::class, 'update']);
    Route::delete('modelinfo/{ModelInfo}', [ModelInfoController::class, 'destroy']);
// });
