<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\myProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\roomController;
use App\Models\register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    
});

Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth');

// Register routes
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'registerPost']);


//room route
Route::get('/room', [roomController::class,'index']);
Route::get('/room/create', [roomController::class,'create']);

Route::get('/profil', [myProfilController::class,'index']);

//ROUTE FILE
Route::get('/files', [FileController::class, 'index'])
    ->name('files.index');

Route::get('/files/create', [FileController::class, 'create'])
    ->name('files.create');

Route::post('/files/store', [FileController::class, 'store'])
    ->name('files.store');
     
Route::get('/files/{file}/edit', [FileController::class, 'edit'])
    ->name('files.edit');
Route::put('/files/{file}/update', [FileController::class, 'update'])
    ->name('files.update');

Route::get('/files/{file}/delete', [FileController::class, 'delete'])->name('files.delete');;

Route::get('/files/{file}/download', [FileController::class, 'download'])
    ->name('files.download');
