<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CalculatorController;
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
    return view('layouts.app');
});

Route::resource('services', ServiceController::class);
Route::get('calculator', [CalculatorController::class, 'index'])->name('calculator.index');
Route::post('calculator', [CalculatorController::class, 'showResult'])->name('calculator.showResult');
