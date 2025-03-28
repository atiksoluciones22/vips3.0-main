<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    SettingController,
    RequestController,
    DashboardController,
    TrainingController
};

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

Auth::routes();

Route::redirect('/', '/login');

Route::get('/settings', [SettingController::class, 'index'])->middleware('auth')->name('settings');
Route::put('/settings', [SettingController::class, 'update'])->middleware('auth')->name('settings.update');

Route::group(['middleware' => ['auth', 'check.password.field.filled']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-information', [UserController::class, 'information'])->name('user.information');
    Route::get('/capacitaciones', [TrainingController::class, 'index'])->name('trainings.index');
    Route::get('/solicitudes', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/solicitudes/crear', [RequestController::class, 'create'])->name('requests.create');
});
