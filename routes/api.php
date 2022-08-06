<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthorController;

// register
Route::post('/register', [RegisterController::class, 'store'])->name('api.register');

//Category
Route::apiResource('/categories', CategoryController::class)->names('api.categories');
/* Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('api.categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('api.categories.show');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('api.categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('api.categories.destroy'); */

//Author
Route::apiResource('/authors', AuthorController::class)->names('api.authors');

// auth sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
