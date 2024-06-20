<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\myProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\roomController;
use App\Models\register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [loginController::class, 'login'])->name('login');
    Route::post('/login', [loginController::class, 'store']);
    
});

Route::get('/logout', [loginController::class, 'destroy'])->middleware('auth');

// Register routes
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerPost'])->name('register.post');


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
     
Route::put('/files/edit', [FileController::class, 'edit'])
    ->name('files.edit');
Route::put('/files/{file}/update', [FileController::class, 'update'])->name('file.update')
    ->name('files.update');

Route::delete('/files/delete', [FileController::class, 'delete'])->name('files.delete');;

Route::get('/files/{file}/download', [FileController::class, 'download'])
    ->name('files.download');
