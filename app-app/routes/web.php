<?php

use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\networkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::resource('users', UserController::class);
//login:
Route::get('/login',[LoginController::class,'showForm'])->name('formLogin');
Route::post('/login',[LoginController::class,'login'])->name('login');







//servers routes:


Route::get('/nbr',[ServerController::class,'nbrServers']);

Route::middleware(['auth'])->group(function () {
    Route::resource('server',ServerController::class);
    Route::resource('laptop',LaptopController::class);
    Route::resource('network',networkController::class);
    Route::get('/home',function(){
        return view('home');
    })->name('homepage');
    Route::get('/users-all',[UserController::class,'index'])->name('index');
    Route::get('/search-user', [UserController::class, 'search'])->name('searchUser');


    Route::get('/asset-type', [ServerController::class, 'nbrServers'])->name('asset-type');


Route::get('/asset-type/servers',[ServerController::class,'index'])->name('servers');
Route::get('/search-server', [ServerController::class, 'search'])->name('searchServer');
Route::post('/servers/use/{server}',[ProductController::class, 'useServer'])->name('server.use');


Route::get('/asset-type/laptops',[LaptopController::class,'index'])->name('laptops');
Route::get('/search-laptop', [LaptopController::class, 'search'])->name('searchLaptop');
Route::post('/laptops/use/{laptop}',[ProductController::class, 'useLaptop'])->name('laptop.use');



Route::get('/asset-type/network-equipment',[networkController::class,'index'])->name('network-equipment');
Route::get('/search-network-equipment', [networkController::class, 'search'])->name('searchNetwork');
Route::post('/network/use/{network}',[ProductController::class, 'useNetwork'])->name('network.use');

Route::get('/your-product', [ProductController::class, 'yourProduct']) ->name('yourProduct');
Route::get('/filter-data', [ProductController::class, 'filter'])->name('filterData');

Route::get('/',[LoginController::class,'logout'])->name('logout');

});
