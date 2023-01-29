<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TermController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Route::group(['as' => 'auth.'], function () {
    Route::view('login', 'auth.login')->name('login-page');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.', 'middleware' => ['superadmin']], function () {
        Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => ['staff']], function () {
        Route::get('/', [StaffController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['student']], function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'classes', 'as' => 'classes.'], function () {
        Route::get('/', [ClassRoomController::class, 'index'])->name('index');
        Route::get('create', [ClassRoomController::class, 'create'])->name('create');
        Route::post('store', [ClassRoomController::class, 'store'])->name('store');
        Route::get('{class}/edit', [ClassRoomController::class, 'edit'])->name('edit');
        Route::patch('{class}/update', [ClassRoomController::class, 'update'])->name('update');
        Route::patch('{class}/toggle-status', [ClassRoomController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{class}/delete', [ClassRoomController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('{subject}/edit', [SubjectController::class, 'edit'])->name('edit');
        Route::patch('{subject}/update', [SubjectController::class, 'update'])->name('update');
        Route::patch('{subject}/toggle-status', [SubjectController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{subject}/delete', [SubjectController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'grades', 'as' => 'grades.'], function () {
        Route::get('/', [GradeController::class, 'index'])->name('index');
        Route::get('create', [GradeController::class, 'create'])->name('create');
        Route::post('create', [GradeController::class, 'store']);
        Route::get('{grade}/edit', [GradeController::class, 'edit'])->name('edit');
        Route::patch('{grade}/edit', [GradeController::class, 'update']);
        Route::delete('{grade}/delete', [GradeController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'terms', 'as' => 'terms.'], function () {
        Route::get('/', [TermController::class, 'index'])->name('index');
        Route::get('create', [TermController::class, 'create'])->name('create');
        Route::post('store', [TermController::class, 'store'])->name('store');
        Route::get('{term}/edit', [TermController::class, 'edit'])->name('edit');
        Route::patch('{term}/update', [TermController::class, 'update'])->name('update');
        Route::patch('{term}/toggle-status', [TermController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{term}/delete', [TermController::class, 'destroy'])->name('delete');
    });

});
