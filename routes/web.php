<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organizer\EventController as OrganizerEventController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\ProfileController;
use Barryvdh\DomPDF\Facade\Pdf;
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



Route::get('/banned', [HomeController::class, 'banned'])->name('banned-page');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/events', [HomeController::class, 'search']);
Route::get('/events/{event}', [HomeController::class, 'showEvent'])->name('show.event');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'CheckIfBanned'])->group(function () {
    // user routes
    Route::get('/my-reservations', [UserEventController::class, 'index'])->name('my.reservations');
    Route::get('/events/{event}/ticket', [PdfController::class, 'generateTicket'])->name('ticket');
    Route::get('/events/reserve/{event_id}', [UserUserController::class, 'reserve'])->name('user.events.reserve');
    // organizer routes
    Route::prefix('Organizer')->group(function () {
        Route::get('/events/requests/{reservation}/accept', [OrganizerEventController::class, 'acceptReservation'])->name('organizer.dashboard.reservation.accept');
        Route::get('/events/requests/{reservation}/reject', [OrganizerEventController::class, 'rejectReservation'])->name('organizer.dashboard.reservation.reject');
        Route::get('/events/{event}/requests', [OrganizerEventController::class, 'showEventRequests'])->name('organizer.dashboard.events.requests');
        Route::resource('/events', OrganizerEventController::class)->names('organizer.events');
    });
    // admin routes
    Route::prefix('admin/dashboard')->group(function () {
        Route::get('/admin/{user}/ban', [AdminUserController::class, 'ban'])->name('admin.user.ban');
        Route::resource('/categories', AdminCategoryController::class)->names('admin.dashboard.categories');
        Route::get('/events/requests', [AdminEventController::class, 'showEventsRequests'])->name('admin.dashboard.events.requests');
        Route::get('/events/requests/{event}/accept', [AdminEventController::class, 'acceptEvent'])->name('admin.dashboard.events.accept');
        Route::get('/events/requests/{event}/reject', [AdminEventController::class, 'rejectEvent'])->name('admin.dashboard.events.reject');
        Route::resource('/events', AdminEventController::class)->names('admin.dashboard.events');
        Route::resource('/users', AdminUserController::class)->names('admin.dashboard.users');
        Route::get('/statistic', [AdminStatisticController::class, 'index'])->name('admin.dashboard.statistic');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
