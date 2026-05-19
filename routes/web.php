<?php
use App\Http\Controllers\DemoController;
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

Route::get('/demo3/{id}', [DemoController::class, 'index3']);

Route::get('/demo4/{id?}', [DemoController::class, 'index4']);