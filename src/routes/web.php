<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('channel', [ChatController::class, 'index'])->name('channel.index');
Route::post('channel', [ChatController::class, 'store'])->name('channel.store');
