<?php
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //resume rooutes
    Route::get('/resume/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::patch('/resume/update', [ResumeController::class, 'update'])->name('resume.update');
});

require __DIR__.'/auth.php';
