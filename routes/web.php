<?php

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

Route::get('/{any?}', function () {
    $index = public_path('index.html');
    if (file_exists($index)) {
        return response()->file($index);
    }
    return view('welcome');
})->where('any', '^(?!api/).*');
