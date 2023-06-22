<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::group(['prefix' => 'companies'], function () {
        Route::get('/', [\App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
        Route::get('/create', [\App\Http\Controllers\CompanyController::class, 'create'])->name('companies.create');
        Route::post('/store', [\App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
        Route::delete('/delete/{id}', [\App\Http\Controllers\CompanyController::class, 'delete'])->name('companies.delete');
        Route::get('/edit', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('companies.edit');
        Route::patch('/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
    });
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/store', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
        Route::delete('/delete/{id}', [\App\Http\Controllers\EmployeeController::class, 'delete'])->name('employees.delete');
        Route::get('/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
        Route::patch('/update/{id}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    });

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
