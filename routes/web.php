<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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

// Route::get('/', [PersonController::class, 'index']);
// Route::get('/add', [PersonController::class, 'add']);
// Route::post('/add', [PersonController::class, 'create']);
// Route::get('/edit', [PersonController::class, 'edit']);
// Route::post('/edit', [PersonController::class, 'update']);
// Route::get('/delete', [PersonController::class, 'delete']);
// Route::post('/delete', [PersonController::class, 'remove']);



Route::get('/', [PersonController::class, 'index']);
Route::get('/find', [PersonController::class, 'find']);
Route::post('/find', [PersonController::class, 'search']);
// Route::get('/person/{person}', [PersonController::class, 'bind']);
Route::get('/add', [PersonController::class, 'add']);
Route::post('/add', [PersonController::class, 'create']);
Route::get('/edit', [PersonController::class, 'edit']);
Route::post('/edit', [PersonController::class, 'update']);
Route::get('/delete', [PersonController::class, 'delete']);
Route::post('/delete', [PersonController::class, 'remove']);