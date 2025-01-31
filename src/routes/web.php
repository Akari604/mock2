<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance', [UserController::class, 'index']);
Route::get('/attendance/list', [UserController::class, 'getList']);
Route::get('/attendance/{id}', [UserController::class, 'getDetail']);
Route::get('/stamp_correction_request/list', [UserController::class, 'getRequest']);

Route::get('/admin/attendance/list', [AdminController::class, 'getList']);
Route::get('/attendance/{id}', [AdminController::class, 'getDetail']);
Route::get('/admin/staff/list', [AdminController::class, 'getStaff']);
Route::get('/admin/staff/list/{id}', [AdminController::class, 'getStaff']);
Route::get('/stamp_correction_request/list', [AdminController::class, 'getRequest']);
Route::get('/stamp_correction_request/approve/{attendance_correct_request', [AdminController::class, 'getApprove']);
