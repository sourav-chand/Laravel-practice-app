<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('tasks.index'));

Route::resource('tasks', TaskController::class);
Route::post('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
