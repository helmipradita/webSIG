<?php

use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\KategoriController;
use App\Models\Category;
use App\Models\User;
use App\Models\WebModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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

// Route::get('/', function () {
//     // $user = User::get()->find(1);
//     // //$role1 = Role::create(['name' => 'super admin']);
//     // $user->assignRole('penjual');
//     // dd($user);
//     return view('welcome');
// });

Auth::routes();

Route::get('/dashboard/products/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');

Route::get('/dashboard/allproducts/checkSlug', [AllProductsController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/allproducts', [App\Http\Controllers\AllProductsController::class, 'index'])->name('allproducts.index');
Route::post('/dashboard/allproducts', [App\Http\Controllers\AllProductsController::class, 'store'])->name('allproducts.create');
Route::get('/dashboard/allproducts/{slug}/edit', [App\Http\Controllers\AllProductsController::class, 'edit'])->name('allproducts.edit');

Route::middleware('has.role')->prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::post('change-password', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('change.password');

    Route::get('profile/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update/{id}', [App\Http\Controllers\DashboardController::class, 'update']);

    //Kecamatan
    Route::get('kecamatan', [App\Http\Controllers\KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::post('kecamatan/create', [App\Http\Controllers\KecamatanController::class, 'store'])->name('kecamatan.create');
    Route::get('kecamatan/edit/{id_kecamatan}', [App\Http\Controllers\KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::post('kecamatan/update/{id_kecamatan}', [App\Http\Controllers\KecamatanController::class, 'update']);
    Route::get('kecamatan/delete/{id_kecamatan}', [App\Http\Controllers\KecamatanController::class, 'delete'])->name('kecamatan.delete');

    //Tempat
    Route::get('tempat', [App\Http\Controllers\TempatController::class, 'index'])->name('tempat.index');
    Route::post('tempat/create', [App\Http\Controllers\TempatController::class, 'store'])->name('tempat.create');
    Route::get('tempat/edit/{id_tempat}', [App\Http\Controllers\TempatController::class, 'edit'])->name('tempat.edit');
    Route::post('tempat/update/{id_tempat}', [App\Http\Controllers\TempatController::class, 'update']);
    Route::get('tempat/delete/{id_tempat}', [App\Http\Controllers\TempatController::class, 'delete'])->name('tempat.delete');

    //Kategori
    Route::get('kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
    Route::post('kategori/create', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.create');
    Route::get('kategori/edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('kategori/update/{id}', [App\Http\Controllers\KategoriController::class, 'update']);
    Route::get('kategori/delete/{id}', [App\Http\Controllers\KategoriController::class, 'delete'])->name('kategori.delete');

    //All User
    Route::get('alluser', [App\Http\Controllers\AllUserController::class, 'index'])->name('alluser.index');
    Route::post('alluser/create', [App\Http\Controllers\AllUserController::class, 'store'])->name('alluser.create');
    Route::get('alluser/edit/{id}', [App\Http\Controllers\AllUserController::class, 'edit'])->name('alluser.edit');
    Route::post('alluser/update/{id}', [App\Http\Controllers\AllUserController::class, 'update']);
    Route::get('alluser/delete/{id}', [App\Http\Controllers\AllUserController::class, 'delete'])->name('alluser.delete');

    Route::middleware('role:admin')->prefix('role-and-permission')->namespace('Permissions')->group(function () {
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

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/kecamatan/{id_kecamatan}', [App\Http\Controllers\WebController::class, 'kecamatan'])->name('kecamatan');

Route::get('/detailtempat/{id_tempat}', [App\Http\Controllers\WebController::class, 'detailtempat'])->middleware('auth')->name('detailtempat');

// Route::get('/', function() {
//     return view('index', [
//         "title" => "Index",
//         "active" => "index",
//     ]);
// });

Route::get('/kontak', function() {
    return view('kontak', [
        "title" => "Kontak",
        "active" => "kontak",
    ]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->middleware('auth');

Route::get('/categories', function()
{
    return view('categories', [
        'title' => 'Halaman Categories',
        "active" => "categories",
        'categories' => Category::all(),
        'kecamatan' => WebModel::DataKecamatan(),
    ]);
});