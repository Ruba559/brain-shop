<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
 return   setting('contactus.usage');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
