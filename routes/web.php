<?php

use App\Http\Controllers\BotManChatController;
use App\Http\Controllers\WebNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
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


Route::get('/countries-list',[CountryController::class, 'index'])->name('countries.list');
Route::post('/add-country',[CountryController::class,'addCountry'])->name('add.country');
Route::get('/getCountriesList',[CountryController::class, 'getCountriesList'])->name('get.countries.list');
Route::post('/getCountryDetails',[CountryController::class, 'getCountryDetails'])->name('get.country.details');
Route::post('/updateCountryDetails',[CountryController::class, 'updateCountryDetails'])->name('update.country.details');
Route::post('/deleteCountry',[CountryController::class,'deleteCountry'])->name('delete.country');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/downloadpdf', [CountryController::class, 'downloadpdf'])->name('downloadpdf');

Route::match(['get', 'post'], '/botman-chat', [BotManChatController::class,'invoke']);

Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');


//fsfdsfd

<<<<<<< HEAD
=======
//jhbjh
//kjnkjn
>>>>>>> b90b37aa32ad60049ebe40eb19d1c34abcbf71e6
//knkkjn
