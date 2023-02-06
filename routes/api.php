<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClassRoomController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TermController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::patch('{subject}/update', [SubjectController::class, 'update'])->name('update');
        Route::patch('{subject}/toggle-status', [SubjectController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{subject}/delete', [SubjectController::class, 'destroy'])->name('delete');
    
        Route::get('deleted', [SubjectController::class, 'deleted'])->name('deleted');
        Route::patch('{subject}/restore', [SubjectController::class, 'restore'])->name('restore');
        Route::delete('{subject}/force-delete', [SubjectController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'classes', 'as' => 'classes.'], function () {
        Route::get('/', [ClassRoomController::class, 'index'])->name('index');
        Route::post('store', [ClassRoomController::class, 'store'])->name('store');
        Route::patch('{class}/update', [ClassRoomController::class, 'update'])->name('update');
        Route::patch('{class}/toggle-status', [ClassRoomController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{class}/delete', [ClassRoomController::class, 'destroy'])->name('delete');
        
        Route::get('deleted', [ClassRoomController::class, 'deleted'])->name('deleted');
        Route::patch('{class}/restore', [ClassRoomController::class, 'restore'])->name('restore');
        Route::delete('{class}/force-delete', [ClassRoomController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'terms', 'as' => 'terms.'], function () {
        Route::get('/', [TermController::class, 'index'])->name('index');
        Route::post('store', [TermController::class, 'store'])->name('store');
        Route::patch('{term}/update', [TermController::class, 'update'])->name('update');
        Route::patch('{term}/toggle-status', [TermController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{term}/delete', [TermController::class, 'destroy'])->name('delete');

        Route::get('deleted', [TermController::class, 'deleted'])->name('deleted');
        Route::patch('{term}/restore', [TermController::class, 'restore'])->name('restore');
        Route::delete('{term}/force-delete', [TermController::class, 'forceDelete'])->name('force-delete');
    });
});
