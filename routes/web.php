<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

Route::get('/', fn () => redirect()->route('dishes.index'));

// Specific routes BEFORE the resource route
Route::get('/dishes/featured', [DishController::class, 'featured'])->name('dishes.featured');
Route::get('/dishes/origin/{origin?}', [DishController::class, 'filter'])->name('dishes.filter');

Route::resource('dishes', DishController::class);