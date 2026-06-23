<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'show'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('authenticate');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('tasklists')->as('tasklist.')->group(function () {
        Route::get('/', [App\Http\Controllers\TaskListController::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\TaskListController::class, 'store'])->name('store');
        Route::patch('/{tasklist}', [App\Http\Controllers\TaskListController::class, 'update'])->name('update');
        Route::delete('/{tasklist}', [App\Http\Controllers\TaskListController::class, 'destroy'])->name('destroy');

        Route::prefix('tasks')->as('task.')->group(function () {
            Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\TaskController::class, 'store'])->name('store');
            Route::patch('/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');
            Route::delete('/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy');
        });
    });
});
