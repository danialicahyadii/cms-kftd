<?php

use App\Http\Controllers\AwardController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CorporateGovernancesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('apps.adash.dash');
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resources([
        '/' => DashboardController::class,
        'award' => AwardController::class,
        'banners' => BannersController::class,
        'branch' => BranchController::class,
        'categories' => CategoriesController::class,
        'corporate-governances' => CorporateGovernancesController::class,
        'customer' => CustomerController::class,
        'events' => EventsController::class,
        'news' => NewsController::class,
        'principal' => PrincipalController::class,
        'product' => ProductController::class,
        'staffs' => StaffsController::class,
    ]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
