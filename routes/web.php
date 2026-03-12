<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('product')->controller(ProductController::class)->group(function(){
Route::get('/', 'index')->name('product.index');   
Route::get('/create', 'create') ;
Route::get('/{producto}','show');
Route::delete('/{product}','destroy')->name('product.destroy');
#url es para recibir datos desde post
Route::post('/store', 'store')->name('product.store');

});
