<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LoginController;
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

Route::group(['middleware' => ['auth:sanctum']], function() {


});

Route::get('home',[HomeController::class, 'HomePageCat']);
Route::get('AllProducts',[HomeController::class, 'AllProducts']);
Route::POST('home/subcategory',[HomeController::class, 'HomePageSub']);
Route::POST('home/product',[HomeController::class, 'HomePagePro']);
Route::POST('loginapi', [LoginController::class, 'login']);
