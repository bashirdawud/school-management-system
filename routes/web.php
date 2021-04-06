<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;


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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// user management all routes


Route::prefix('users')->group(function (){

    Route::get('/view', [UserController::class, 'Userview'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('add.user');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');


});

Route::prefix('profile')->group(function () {
    
    Route::get('/view', [ProfileController::class, 'ViewProfile'])->name('profile.view');
    Route::get('/edit/{id}', [ProfileController::class, 'EditProfile'])->name('edit.profile');
    Route::get('/edit/{id}', [ProfileController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/update', [ProfileController::class, 'UpdateProfile'])->name('profile.update');
    Route::get('/password-view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});