<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\StatMiddleware;

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

Route::get('/', [LoginController::class, 'index'])->middleware([StatMiddleware::class]);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/forgot-password', [RegisterController::class, 'forgot']);
Route::resource('register', RegisterController::class, ['only' => [
    'index', 'store'
]]);
Route::get('/logout', [LoginController::class, 'logout']);
Route::group(['middleware' => LoginMiddleware::class], function () {

    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    //Data KTP
    Route::resource('transaction', PrescriptionController::class, ['only' => [
        'index', 'store', 'update', 'edit', 'destroy'
    ]]);
});
