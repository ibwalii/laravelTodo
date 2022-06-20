<?php

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
use app\Http\Controllers\TodoController;


Route::get('/', 'App\Http\Controllers\TodoController@index');

Route::get('create', 'App\Http\Controllers\TodoController@create');

Route::post('store-data', 'App\Http\Controllers\TodoController@store');

Route::get('details/{todo}', 'App\Http\Controllers\TodoController@details');

Route::get('edit/{todo}', 'App\Http\Controllers\TodoController@edit');

Route::post('update/{todo}', 'App\Http\Controllers\TodoController@update');

Route::get('delete/{todo}', 'App\Http\Controllers\TodoController@delete');

// Route::get('/', [TodoController::class, 'index']);

// Route::get('create', [TodoController::class, 'create']);

// Route::get('details', [ TodoController::class, 'details']);

// Route::get('edit', [TodoController::class, 'edit']);

// Route::post('update', [TodoController::class, 'update']);

// Route::get('delete', [TodoController::class, 'delete']);

