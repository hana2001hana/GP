<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuHeaderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/home', [MenuHeaderController::class, 'index']);

    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/resume/{id}', 'ResumeResultController@show')->name('resume.show');


// مسار لعرض نموذج رفع الملف
Route::get('/upload', 'FileUploadController@index')->name('upload');
// مسار لمعالجة تحميل الملف
Route::post('/upload', 'FileUploadController@store')->name('upload');
// مسار للصفحة الشخصية
Route::get('/CV', 'CVController@index')->name('CV');








