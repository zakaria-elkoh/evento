<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organizer\EventController as OrganizerEventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('Organizer')->group(function () {
    Route::resource('/events', OrganizerEventController::class)->names('organizer.events');
});

Route::prefix('admin/dashboard')->group(function () {
    Route::resource('/categories', AdminCategoryController::class)->names('admin.dashboard.categories');
    Route::resource('/events', AdminEventController::class)->names('admin.dashboard.events');
    Route::resource('/users', AdminUserController::class)->names('admin.dashboard.users');
    Route::get('/statistic', [AdminStatisticController::class, 'index'])->name('admin.dashboard.statistic');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
