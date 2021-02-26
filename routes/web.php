<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MainController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/demo', [DemoController::class, 'index'])->name('demo');
Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::post('/confirm', [UserController::class, 'numberConfirm'])->name('register.numberConfirm');
    Route::get('/login',[UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login',[UserController::class, 'login'])->name('login');
});

Route::get('/logout',[UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/',[MainController::class, 'index']);
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Кэш очищен.";
});

//Route::get('/{subdir1}', function ($subdir1) {
//    return "Путь запроса 1 - kvik-laravel/$subdir1";
//})->where('subdir1' , '[a-zA-Z0-9-]+');

//Route::get('/{subdir1}/{subdir2}', function ($subdir1, $subdir2) {
//    return 'Путь запроса - kvik-laravel/'.$subdir1.'/'.$subdir2;
//});
//
//Route::get('/{subdir1}/{subdir2}/{subdir3}', function ($subdir1, $subdir2, $subdir3) {
//    return 'Путь запроса - kvik-laravel/'.$subdir1.'/'.$subdir2.'/'.$subdir3;
//});

//Route::get('/{sublevels?}', function ($sublevels) {
//    return 'Путь запроса - kvik-laravel/'.dump($sublevels);
//})->where('sublevels', '(.*)');

//Route::fallback(function (){
//    return redirect()->route('home');
////    abort(404, 'Опаньки, а страничку черти сьели!!!', $http_response_header);
//});

Route::get('/errors',function(){
    abort(404);
});
