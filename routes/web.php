<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])->name('portfolio');
Route::post('/language/{locale}', function (Request $request, string $locale) {
    $request->session()->put('locale', $locale);

    return to_route('portfolio');
})->whereIn('locale', ['en', 'id'])->name('language.switch');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (): void {
    Route::view('projects/create', 'admin.projects.create')->middleware('can:create,App\\Models\\Project')->name('projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
});
