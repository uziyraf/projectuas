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
    Route::post('/login', [loginController::class, 'index']);
    Route::get('/login', [loginController::class, 'login'])->name('login');
    Route::post('/login', [loginController::class, 'store']);
    
});

Route::get('/logout', [loginController::class, 'destroy'])->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'simpan']);


// Route::prefix('/register')->middleware('auth')->group(function() {
//     Route::get('/', [registerController::class, 'index']);
//     Route::get('/create', [registerController::class, 'create']);
//     Route::post('/', [registerController::class, 'store']);
// });


// Route::get('/room', [roomController::class,'index']);
// Route::get('/room/create', [roomController::class,'create']);

// Route::get('/profil', [myProfilController::class,'index']);

// //ROUTE FILE
// Route::get('/files', [FileController::class, 'index'])
//     ->name('files.index');

// Route::get('/files/create', [FileController::class, 'create'])
//     ->name('files.create');

// Route::post('/files/store', [FileController::class, 'store'])
//     ->name('files.store');
     
// Route::get('/files/edit', [FileController::class, 'edit'])
//     ->name('files.edit');
// Route::put('/files/{file}/update', [FileController::class, 'update'])
//     ->name('files.update');

// Route::delete('/files/delete', [FileController::class, 'delete'])->name('files.delete');;

// Route::get('/files/{file}/download', [FileController::class, 'download'])
//     ->name('files.download');
