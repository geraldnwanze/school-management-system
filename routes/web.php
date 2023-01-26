<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdminController;
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


//authentication routes
Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@userLogin');
Route::post('/logout', 'Auth\AuthController@logout')->name('logout');

//authenticated users
// Route::group([
    // 'middleware' => 'auth', 
    // 'as' => 'dashboard.'], function () {
    // Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.'], function () {
    //     Route::get('/dashboard', 'Admin\DashboardController@superadmin')->name('dashboard');

        //students
        // Route::get('/create-student', 'Student\RegistrationController@index')->name('createStudent');
        // Route::post('/create-student', 'Student\RegistrationController@saveStudent');

        //staffs
    //     Route::get('/create-staff', 'Staff\RegistrationController@index')->name('createStaff');
    //     Route::post('/create-staff', 'Staff\RegistrationController@saveStaff');
    // });

    // Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    //     Route::get('/dashboard', 'Admin\DashboardController@admin')->name('dashboard');
        
        //students
        // Route::get('/create-student', 'Student\RegistrationController@index')->name('createStudent');
        // Route::post('/create-student', 'Student\RegistrationController@saveStudent');

        //staffs
        // Route::get('/create-staff', 'Staff\RegistrationController@index')->name('createStaff');
        // Route::post('/create-staff', 'Staff\RegistrationController@saveStaff');
        // Route::get('/assign-staff-to-class', 'Staff\AssignStaffController@index')->name('assignStaff');
        // Route::post('/assign-staff-to-class', 'Staff\AssignStaffController@saveStaffAssignment');
        // Route::get('/assign-subject-to-staff', 'Staff\AssignStaffController@assignSubject')->name('assignSubject');
        // Route::post('/assign-subject-to-staff', 'Staff\AssignStaffController@saveAssignSubject');
        // Route::get('/create-classes', 'Student\ClassesController@createClass')->name('createClass');
        // Route::get('/create-subjects', 'Student\SubjectsController@createSubject')->name('createSubject');
        
    // });

    // Route::group(['prefix' => 'student', 'as' => 'students.'], function () {
    //     Route::get('/dashboard', 'Student\DashboardController@index');
    //     Route::get('/check-result', 'Student\ResultController@checkResult');
    // });

    // Route::group(['prefix' => 'staff', 'as' => 'staffs.'], function () {
    //     Route::get('/dashboard', 'Staff\DashboardController@index');
    // });

// });

/**************************************************************** */

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
});
