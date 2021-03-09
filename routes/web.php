<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DataController;
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
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('owners', OwnerController::class);
    //Route::put('lists/{category}/sublist', [ListController::class, 'sublist'])->name('lists.sublist');
    // ['as' => 'named.route' , 'uses' => 'MenuController@listItem']
    //Route::put('lists/{category}/sublist',  ['as' => 'lists.sublist' , 'uses' => 'ListController@sublist']);
    //Route::resource('lists', ListController::class);
    Route::get('lists', [DataController::class, 'CatList'])->name('lists.Category');
    Route::get('lists/{category}', [DataController::class, 'SubCatList'])->name('lists.SubCategory');
    //Route::get('lists/{category}/{subcategory}', [DataController::class, 'SubCatList'])->name('lists.SubCategory');
    Route::get('lists/{category}/{subcategory}', [DataController::class, 'ProList'])->name('lists.Product');

});