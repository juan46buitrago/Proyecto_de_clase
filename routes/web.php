<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminCategoryController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('admin')->controller(AdminCategoryController::class)->group(function () {
    Route::get('/', 'index')->name('admin.index');
    Route::post('/categories', 'store')->name('admin.categories.store');
    Route::put('/categories/{category}', 'update')->name('admin.categories.update');
    Route::delete('/categories/{category}', 'destroy')->name('admin.categories.destroy');
});

Route::prefix('product')->controller(ProductController::class)->group(function(){
Route::get('/', 'index')->name('product.index');   
Route::get('/create', 'create') ;
Route::get('/{producto}','show');
Route::delete('/{product}','destroy')->name('product.destroy');
#url es para recibir datos desde post
Route::post('/store', 'store')->name('product.store');

});
