<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\BrandController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ComplaintController;
use App\Http\Controllers\Api\v1\FavoriteController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\OrderDetailController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\UserController;

Route::get('/brands', [BrandController::class, 'index']);
Route::post('/brand', [BrandController::class, 'store']);
Route::post('/brand/{id}', [BrandController::class, 'update']);
Route::delete('/brand/{id}', [BrandController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::post('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/complaints', [ComplaintController::class, 'index']);
Route::post('/complaint', [ComplaintController::class, 'store']);
Route::post('/complaint/{id}', [ComplaintController::class, 'update']);
Route::delete('/complaint/{id}', [ComplaintController::class, 'destroy']);

Route::get('/favorite', [FavoriteController::class, 'index']);
Route::post('/favorite', [FavoriteController::class, 'store']);
Route::post('/favorite/{id}', [FavoriteController::class, 'update']);
Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::post('/order/{id}', [OrderController::class, 'update']);
Route::delete('/order/{id}', [OrderController::class, 'destroy']);

Route::get('/orderDetails', [OrderDetailController::class, 'index']);
Route::post('/orderDetail', [OrderDetailController::class, 'store']);
Route::post('/orderDetail/{id}', [OrderDetailController::class, 'update']);
Route::delete('/orderDetail/{id}', [OrderDetailController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::post('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::post('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);