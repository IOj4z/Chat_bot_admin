<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\DashboardController;
use App\Http\Controllers\API\V1\NetworkingController;
use App\Http\Controllers\API\V1\EventController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::post('/auth/register', [AuthController::class, 'createUser']);
////Route::post('/auth/login', [AuthController::class, 'loginUser']);
////Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
//
//Route::group([
//    'prefix' =>'admin',
////    'middleware' =>'auth:sanctum',
//], function () {
//    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
//    Route::post('upload_file',[\App\Http\Controllers\FileController::class,'upload'])->name('upload_file.upload');
//    Route::post('upload_file',[\App\Http\Controllers\FileController::class,'store'])->name('upload_file.store');
//    Route::resource('networking', 'NetworkingController');
//    Route::resource('users', 'UserController');
//Route::resource('events', 'EventController');
//    Route::delete('events/{event}/members/{id}', [EventController::class,'deleteMembers'])->name('events.destroy.members');
//});
