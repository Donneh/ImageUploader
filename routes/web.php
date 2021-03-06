<?php

use App\Http\Controllers\ImageController;
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
    return view('images.index');
});
Route::get('/images', [ImageController::class, 'index']);
Route::post('/upload', [ImageController::class, 'store']);
Route::delete('/images', [ImageController::class, 'delete']);
