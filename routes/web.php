<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ImageController;
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
    return view('home');
});

Route::get('table',[CrudController::class,'getTable']);
Route::post('add',[CrudController::class,'addProvider']);
Route::post('update',[CrudController::class,'updateProvider']);
Route::post('delete',[CrudController::class,'deleteProvider']);
Route::post('view',[CrudController::class,'viewProvider']);

Route::post('getimage',[ImageController::class,'getImageFromURL']);