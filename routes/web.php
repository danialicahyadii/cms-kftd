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
use App\Http\Controllers\StaffsController;
use App\Models\CorporateGovernances;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth-login2');
});
Route::resources([
    'dashboard' => DashboardController::class,
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
