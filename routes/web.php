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

//route Register

Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'registerPost']);


//route room 
// Route::prefix('/room')->middleware('auth')->group(function() {
Route::get('/room', [roomController::class,'index'])->name('room')->middleware('auth');
Route::get('/room/create', [roomController::class,'create'])->middleware('auth');

Route::get('/profil', [myProfilController::class,'index'])->middleware('auth');


//ROUTE FILE
// Route::prefix('/files')->middleware('auth')->group(function() {
Route::get('/files', [FileController::class, 'index'])->name('files.index')->middleware('auth');

Route::get('/files/create', [FileController::class, 'create'])->name('files.create')->middleware('auth');

Route::post('/files/store', [FileController::class, 'store'])->name('files.store')->middleware('auth');
     
Route::get('/files/{file}/edit', [FileController::class, 'edit'])->name('files.edit')->middleware('auth');
Route::put('/files/{file}/update', [FileController::class, 'update'])->name('files.update')->middleware('auth');

Route::get('/files/{file}/delete', [FileController::class, 'delete'])->name('files.delete')->middleware('auth');

Route::get('/files/{file}/download', [FileController::class, 'download'])->name('files.download')->middleware('auth');
