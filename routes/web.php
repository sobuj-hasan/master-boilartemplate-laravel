<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\LanguageController;


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/contact-page', [ContactController::class, 'contact'])->name('contact');
Route::get('/aboutUs', [AboutUsController::class, 'index'])->name('aboutUs');
Route::get('/language', [LanguageController::class, 'index'])->name('languagepage');

// Route::get('/admin-dashboard', function () {
//     return view('admin.pages.dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

