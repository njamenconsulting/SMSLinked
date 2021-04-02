<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UploadContactController;
use App\Http\Controllers\SmsController;

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

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('contact/upload/create', [UploadContactController::class, 'create'])->name('upload.create')->middleware('auth');
Route::post('contact/upload/upload', [UploadContactController::class, 'upload'])->name('upload.post')->middleware('auth');
Route::get('contact/upload/display', [UploadContactController::class, 'display'])->name('upload.display')->middleware('auth');
Route::post('contact/upload/store', [UploadContactController::class, 'store'])->name('upload.store')->middleware('auth');

Route::resource('group', GroupController::class)->middleware('auth');
Route::resource('sms', SmsController::class)->middleware('auth');
//add additional routes to a resource controller

Route::resource('contact', ContactController::class)->middleware('auth');
