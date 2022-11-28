<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Output_detailController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\Entry_detailController;
use App\Http\Controllers\EntrieController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;

Route::resource('brands',BrandController::class);
Route::resource('outputs_details',Output_detailController::class);
Route::resource('outputs',OutputController::class);
Route::resource('entries_details',Entry_detailController::class);
Route::resource('entries',EntrieController::class);
Route::resource('employees',EmployeeController::class);
Route::resource('products',ProductController::class);
Route::resource('clients',ClientController::class);

Route::get('/', function () {
    return view('index.index');
});
/* Route::get('/index', function () {
    return view('index');
}); */
