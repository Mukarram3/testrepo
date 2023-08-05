<?php

use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/add-country',[CountryController::class,'addCountry'])->name('add.country');
Route::get('/getCountriesList',[CountryController::class, 'getCountriesList'])->name('get.countries.list');
Route::post('/getCountryDetails',[CountryController::class, 'getCountryDetails'])->name('get.country.details');
Route::post('/updateCountryDetails',[CountryController::class, 'updateCountryDetails'])->name('update.country.details');
Route::post('/deleteCountry',[CountryController::class,'deleteCountry'])->name('delete.country');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//adscasa
//asasdacdasd
//dsaddada
//asdsasd
