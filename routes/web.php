<?php

use App\Http\Controllers\VariantController;
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

Route::get('/', fn () => "Shopify 99 variant problem solution");

Route::controller(VariantController::class)->group(function () {
    Route::post('/', 'store');
    Route::get('/{id}', 'index');
});
