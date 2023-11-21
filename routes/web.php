<?php

use App\Http\Controllers\ReticketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ReticketController::class, "select"]);
Route::get('/insert', [ReticketController::class, "insert"]);
Route::get('/select', [ReticketController::class, "select"]);
Route::get('/update', [ReticketController::class, "update"]);
Route::get('/delete', [ReticketController::class, "delete"]);
Route::get('/retickets/{retickets_id}', [ReticketController::class, "show"]);
