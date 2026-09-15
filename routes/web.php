<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])->name('portfolio');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (): void {
    Route::view('projects/create', 'admin.projects.create')->middleware('can:create,App\\Models\\Project')->name('projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
});
