<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TelephoneTypeController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/telephone-types',[TelephoneTypeController::class, 'index']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('dashboard');
