<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\SanctumServiceProvider;

// Home
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'home']);

// View & Edit Account
Route::get('/account', [App\Http\Controllers\AccountController::class, 'view_account']);
Route::post('/account/EditAccount', [App\Http\Controllers\AccountController::class, 'update_account']);

// Admin List Books
Route::get('/list', [App\Http\Controllers\BooksController::class, 'list'])->name('list');
Route::view('/list/add', 'book');
Route::get('/list/delete/{id}', [App\Http\Controllers\BookController::class, 'delete']);

Route::get('/list/edit/{id}', [App\Http\Controllers\BookController::class, 'edit']);

Route::post('add', [App\Http\Controllers\BookController::class, 'insert']);
Route::post('edit', [App\Http\Controllers\BookController::class, 'update']);

// Search
Route::get('/search', [App\Http\Controllers\WelcomeController::class, 'search']);

// View Item
Route::get('/item/{id}', [App\Http\Controllers\ItemController::class, 'item']);
Auth::routes();
