<?php

use
 App\Http\Controllers\ProfileController;
 use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'editprofile')->name('edit.profile');
    Route::post('/admin/store/profile', 'storeprofile')->name('store.profile');
    Route::get('/admin/edit/password', 'editpassword')->name('edit.password');
    Route::post('/admin/store/password', 'storepassword')->name('store.password');
});


Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/edit/slide', 'HomeSlider')->name('home.slide');
    Route::post('/home/update/slide', 'updateSlider')->name('update.slide');
});

Route::controller(AboutController::class)->group(function () {
   Route::get('/home/about', 'AboutPage')->name('about.update');
   Route::post('/home/update/about', 'AboutStore')->name('about.store');
});

// php artisan route:clear
require __DIR__.'/auth.php';
