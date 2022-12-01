<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CragController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\RouteController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ListController::class, 'index'])->name('list');

Route::get('/crag_create', [CragController::class, 'crag_create'])->name('crag_create');
Route::post('/crag_store', [CragController::class, 'crag_store'])->name('crag_store');

Route::get('/route_create', [RouteController::class, 'route_create'])->name('route_create');
Route::post('/route_store', [RouteController::class, 'route_store'])->name('route_store');
Route::delete('/route_delete/{id}', [RouteController::class, 'destroy']);