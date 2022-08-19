<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriController,
};
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

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'middleware' => ['auth','role:admin|siswa']
], function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    // Role Admin
    Route::group([
        'middleware' => 'role:admin'
    ], function () {
        //Kategori
        Route::get('/kategori/data',[KategoriController::class])->name('kategori.data');
        Route::resource('/kategori', KategoriController::class);
    });

    // Role Siswa
    Route::group([
        'middleware' => 'role:siswa'
    ], function () {
        // 
    });
});

