<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/categories', [CategoryController::class, 'show_cats'])->name('show.cats');
Route::get('/subcategories/{slug}', [SubCategoryController::class, 'show_subcats'])->name('show.subcats');
Route::get('/subcategory/{slug}', [SubCategoryController::class, 'show_subcat'])->name('show.subcat');
Route::get('/post/{slug}', [PostController::class, 'show_post'])->name('show.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['admin', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'list_of_profiles'])->name('profiles');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/change/{id}', [ProfileController::class, 'change'])->name('profile.change');
    Route::post('/change/{id}', [ProfileController::class, 'custom_change'])->name('custom.profile.change');


    Route::get('/crcat', [CategoryController::class, 'create_category'])->name('create.category');
    Route::post('/crcat', [CategoryController::class, 'create'])->name('custom.create.category');
    Route::get('/crsubcat', [SubCategoryController::class, 'create_subcategory'])->name('create.subcategory');
    Route::post('/crsubcat', [SubCategoryController::class, 'create'])->name('custom.create.subcategory');

    Route::get('/ban/{id}', [ProfileController::class, 'ban'])->name('ban');
    Route::post('/ban/{id}', [ProfileController::class, 'ban'])->name('custom.ban');

    Route::get('/unban/{id}', [ProfileController::class, 'unban'])->name('unban');
    Route::post('/unban/{id}', [ProfileController::class, 'unban'])->name('custom.unban');

    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete.post');
    Route::post('/delete/{id}', [PostController::class, 'custom_delete'])->name('custom.delete.post');  

});

Route::middleware('auth')->group(function () {
Route::get('/crpost', [PostController::class, 'create_post'])->name('create.post');
Route::post('/crpost', [PostController::class, 'create'])->name('custom.create.post');
});

Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
