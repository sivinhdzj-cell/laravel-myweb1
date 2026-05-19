<?php
use App\Http\Controllers\DemoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/demo',[DemoController::class,'index']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/vinhdemo', function () {
    return view('home');
});
Route::get('/demo1',[DemoController::class,'index1']);

Route::get('/demo2', [DemoController::class, 'index2']);

Route::get('/demo3', [DemoController::class, 'index3']);

Route::get('/demo4/{id}', [DemoController::class, 'index4']);

Route::get('/demo5/{id?}', [DemoController::class, 'index5']);

Route::resource('admin/category',CategoryController::class);
Route::resource('admin/brand',BrandController::class);
Route::resource('admin/product',ProductController::class);