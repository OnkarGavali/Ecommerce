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
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController; 
use App\Http\Controllers\orderdeatails;

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
  

  
Auth::routes();
  

  
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('orderdeatails', orderdeatails::class);
    Route::resource('banners', BannerController::class);

    Route::get('lists', [DataController::class, 'CatList'])->name('lists.Category');
    Route::get('lists/{category}', [DataController::class, 'SubCatList'])->name('lists.SubCategory');
    Route::get('lists/{category}/{subcategory}', [DataController::class, 'ProList'])->name('lists.Product');
    
});