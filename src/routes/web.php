<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\RestController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/admin', function () {
    return view('admin');
});

Route::middleware(['verified'])->group(function(){
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
});

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth:web')->group(function () {
    Route::prefix('attendance')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('verified');
        Route::get('/start/stamp', [StampController::class, 'clockIn']);
        Route::get('/end/stamp', [StampController::class, 'clockOut']);
        Route::get('/start/rest', [RestController::class, 'takeBreak']);
        Route::get('/end/rest', [RestController::class, 'doneBreak']);
        Route::get('/list', [UserController::class, 'getList']);
        Route::get('/{id}', [UserController::class, 'getDetail']);
    });   
     Route::get('/stamp_correction_request/list', [UserController::class, 'getRequest']);
});

Route::prefix('admin')->group(function () {
    Route::view('/login', 'auth.admin_login')->middleware('guest:admin')->name('admin.login');
    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:' . $limiter : null,
        ]));
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('admin.logout');
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/attendance/list', [AdminController::class, 'getList']);
        Route::get('/previous/list', [CalendarController::class, 'getPrevious']);
        Route::get('/next/list', [CalendarController::class, 'getNext']);
        Route::get('/staff/list', [AdminController::class, 'getStaff']);
        Route::get('/staff/list/{id}', [AdminController::class, 'getStaffId']);
    });
    Route::get('/attendance/{id}', [AdminController::class, 'getAdminDetail']);
    Route::get('/stamp_correction_request/list', [AdminController::class, 'getAdminRequest']);
    Route::get('/stamp_correction_request/approve/{attendance_correct_request', [AdminController::class, 'getApprove']);
});
