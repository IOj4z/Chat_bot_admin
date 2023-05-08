<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'loginPost'])->name('loginPost');

//Auth::routes();
Route::group([
    'middleware' =>['auth'],
], function () {
    Route::get('/',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    Route::post('upload_file',[\App\Http\Controllers\FileController::class,'upload'])->name('upload_file.upload');
    Route::post('upload_file',[\App\Http\Controllers\FileController::class,'store'])->name('upload_file.store');
    Route::resource('networking', 'NetworkingController');
    Route::resource('users', 'UserController');

    Route::post('/moderators/{user_id}',[UserController::class,'addModerator'])->name('moderator');

    Route::resource('events', 'EventController');
    Route::delete('events/{event}/members/{id}', [EventController::class,'deleteMembers'])->name('events.destroy.members');
    Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
});
//Route::resource('members', 'MemberController');
//Route::resource('requests', 'RequestController');
//Route::resource('speakers', 'SpeakerController');

