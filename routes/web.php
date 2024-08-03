<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebPagesController;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Index;
use App\Livewire\Admin\Orders\Orders;
use App\Livewire\Admin\Users\EditUser;
use App\Livewire\Admin\Users\Users;
use App\Livewire\Admin\Zones\Cities;
use App\Livewire\Admin\Zones\Regions;
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


Route::middleware(['web'])->group(function () {

    Route::get('index', [Controller::class, 'index'])->name('index');

    Route::prefix('admin/')->as('admin.')->group(function () {
        Route::middleware(['guest'])->group(function () {
            Route::get('login', Login::class)->name('login');
        });

        Route::middleware(['auth'])->group(function () {
            Route::get('', Index::class)->name('index');

            Route::prefix('users/')->as('users.')->group(function () {
                Route::get('', Users::class)->name('index');
                Route::get('edit/{user}', EditUser::class)->name('edit');
            });

            Route::prefix('regions/')->as('regions.')->group(function () {
                Route::get('', Regions::class)->name('index');
                Route::get('cities', Cities::class)->name('cities');
            });

            Route::prefix('orders/')->as('orders.')->group(function () {
                Route::get('', Orders::class)->name('index');
            });

            Route::controller(AdminPagesController::class)->group(function () {
                Route::get('logout', 'logout')->name('logout');
            });
        });
    });

    Route::as('web.')->group(function () {

        Route::middleware(['guest'])->group(function () {
            Route::get('/', [WebPagesController::class, 'landing'])->name('landing');
        });
    });
});
