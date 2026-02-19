<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/product', [ProductController::class, 'index'] );
Route::get('/product/create',  [ProductController::class, 'create']) 
    
;
Route::get('/product/{producto}',[ProductController::class, 'show']
    );