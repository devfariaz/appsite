<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/quem-somos', function () {
    return view('about');
})->name('about');

Route::get('/contato', function () {
    return view('contact');
})->name('contact');

Route::get('/produtos', [ProductController::class, 'index'])->name('products');
Route::get('/produto/{slug}', [ProductController::class, 'show'])->name('produto.show');