<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('has.role')->prefix('dashboard')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');

    Route::prefix('role-and-permission')->namespace('Permissions')->group(function () {
        Route::get('assignable', [App\Http\Controllers\Permissions\AssignController::class, 'create'])->name('assign.create');
        Route::post('assignable', [App\Http\Controllers\Permissions\AssignController::class, 'store']);
        Route::get('assignable/{role}/edit', [App\Http\Controllers\Permissions\AssignController::class, 'edit'])->name('assign.edit');
        Route::put('assignable/{role}/edit', [App\Http\Controllers\Permissions\AssignController::class, 'update']);
        //User
        Route::get('assign/user', [App\Http\Controllers\Permissions\UserController::class, 'create'])->name('assign.user.create');
        Route::post('assign/user', [App\Http\Controllers\Permissions\UserController::class, 'store']);
        Route::get('assign/{user}/user', [App\Http\Controllers\Permissions\UserController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign/{user}/user', [App\Http\Controllers\Permissions\UserController::class, 'update']);

        Route::prefix('roles')->group(function () {
            Route::get('', [App\Http\Controllers\Permissions\RoleController::class, 'index'])->name('roles.index');
            Route::post('create', [App\Http\Controllers\Permissions\RoleController::class, 'store'])->name('roles.create');
            Route::get('{role}/edit', [App\Http\Controllers\Permissions\RoleController::class, 'edit'])->name('roles.edit');
            Route::put('{role}/edit', [App\Http\Controllers\Permissions\RoleController::class, 'update']);
            Route::get('{role}/delete', [App\Http\Controllers\Permissions\RoleController::class, 'destroy'])->name('roles.delete');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('', [App\Http\Controllers\Permissions\PermissionController::class, 'index'])->name('permissions.index');
            Route::post('create', [App\Http\Controllers\Permissions\PermissionController::class, 'store'])->name('permissions.create');
            Route::get('{permission}/edit', [App\Http\Controllers\Permissions\PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('{permission}/edit', [App\Http\Controllers\Permissions\PermissionController::class, 'update']);
            Route::get('{permission}/delete', [App\Http\Controllers\Permissions\PermissionController::class, 'destroy'])->name('permissions.delete');
        });
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
