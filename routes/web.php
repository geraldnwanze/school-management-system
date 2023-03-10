<?php

use App\Http\Controllers\web\SchoolController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\ClassRoomController;
use App\Http\Controllers\Web\SessionController;
use App\Http\Controllers\Web\GradeController;
use App\Http\Controllers\Web\StaffController;
use App\Http\Controllers\Web\StudentController;
use App\Http\Controllers\Web\SubjectController;
use App\Http\Controllers\Web\SuperAdminController;
use App\Http\Controllers\Web\TermController;
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

Route::redirect('/', 'auth/login');

Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
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

    Route::group(['prefix' => 'school', 'as' => 'school.'], function () {
        Route::get('/', [SchoolController::class, 'index'])->name('index');
        Route::get('create', [SchoolController::class, 'create'])->name('create');
        Route::post('store', [SchoolController::class, 'store'])->name('store');
        Route::get('{school}/edit', [SchoolController::class, 'edit'])->name('edit');
        Route::patch('{school}/update', [SchoolController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'staffs', 'as' => 'staffs.'], function (){
        Route::get('/', [StaffController::class, 'index'])->name('index');
        Route::get('create', [StaffController::class, 'create'])->name('create');
        Route::post('create', [StaffController::class, 'store']);
        Route::get('{staff}/edit', [StaffController::class, 'edit'])->name('edit');
        Route::patch('{staff}/update', [StaffController::class, 'update'])->name('update');
        Route::delete('{staff}/delete', [StaffController::class, 'destroy'])->name('delete');

    });

    Route::group(['prefix' => 'classes', 'as' => 'classes.'], function () {
        Route::get('/', [ClassRoomController::class, 'index'])->name('index');
        Route::get('create', [ClassRoomController::class, 'create'])->name('create');
        Route::post('store', [ClassRoomController::class, 'store'])->name('store');
        Route::get('{class}/edit', [ClassRoomController::class, 'edit'])->name('edit');
        Route::patch('{class}/update', [ClassRoomController::class, 'update'])->name('update');
        Route::patch('{class}/toggle-status', [ClassRoomController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{class}/delete', [ClassRoomController::class, 'destroy'])->name('delete');
        
        Route::get('deleted', [ClassRoomController::class, 'deleted'])->name('deleted');
        Route::patch('{class}/restore', [ClassRoomController::class, 'restore'])->name('restore');
        Route::delete('{class}/force-delete', [ClassRoomController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('{subject}/edit', [SubjectController::class, 'edit'])->name('edit');
        Route::patch('{subject}/update', [SubjectController::class, 'update'])->name('update');
        Route::patch('{subject}/toggle-status', [SubjectController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{subject}/delete', [SubjectController::class, 'destroy'])->name('delete');

        Route::get('deleted', [SubjectController::class, 'deleted'])->name('deleted');
        Route::patch('{subject}/restore', [SubjectController::class, 'restore'])->name('restore');
        Route::delete('{subject}/force-delete', [SubjectController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'grades', 'as' => 'grades.'], function () {
        Route::get('/', [GradeController::class, 'index'])->name('index');
        Route::get('create', [GradeController::class, 'create'])->name('create');
        Route::post('create', [GradeController::class, 'store']);
        Route::get('{grade}/edit', [GradeController::class, 'edit'])->name('edit');
        Route::patch('{grade}/edit', [GradeController::class, 'update'])->name('update');
        Route::delete('{grade}/delete', [GradeController::class, 'destroy'])->name('delete');

        Route::get('deleted', [GradeController::class, 'deleted'])->name('deleted');
        Route::patch('{grade}/restore', [GradeController::class, 'restore'])->name('restore');
        Route::delete('{grade}/force-delete', [GradeController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'terms', 'as' => 'terms.'], function () {
        Route::get('/', [TermController::class, 'index'])->name('index');
        Route::get('create', [TermController::class, 'create'])->name('create');
        Route::post('store', [TermController::class, 'store'])->name('store');
        Route::get('{term}/edit', [TermController::class, 'edit'])->name('edit');
        Route::patch('{term}/update', [TermController::class, 'update'])->name('update');
        Route::patch('{term}/toggle-status', [TermController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{term}/delete', [TermController::class, 'destroy'])->name('delete');

        Route::get('deleted', [TermController::class, 'deleted'])->name('deleted');
        Route::patch('{term}/restore', [TermController::class, 'restore'])->name('restore');
        Route::delete('{term}/force-delete', [TermController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'sessions', 'as' => 'sessions.'], function () {
        Route::get('/', [SessionController::class, 'index'])->name('index');
        Route::get('create', [SessionController::class, 'create'])->name('create');
        Route::post('store', [SessionController::class, 'store'])->name('store');
        Route::get('{session}/edit', [SessionController::class, 'edit'])->name('edit');
        Route::patch('{session}/update', [SessionController::class, 'update'])->name('update');
        Route::patch('{session}/toggle-status', [SessionController::class, 'toggleStatus'])->name('toggle-status');
        Route::delete('{session}/delete', [SessionController::class, 'destroy'])->name('delete');

        Route::get('deleted', [SessionController::class, 'deleted'])->name('deleted');
        Route::patch('{session}/restore', [SessionController::class, 'restore'])->name('restore');
        Route::delete('{session}/force-delete', [SessionController::class, 'forceDelete'])->name('force-delete');
    });

});
