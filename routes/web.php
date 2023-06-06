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

// Landing page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Email verification
Route::group(['middleware' => 'auth', 'prefix' => 'email'], function () {
    Route::get('/verify', [App\Http\Controllers\EmailVerificationController::class, 'sendVerification'])->name('verification.notice');
    Route::get('/verify/{id}/{hash}', [App\Http\Controllers\EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
    Route::post('/verification-notification', [App\Http\Controllers\EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');
});

// Verified routes
Route::group(['middleware' => ['verified', 'not.banned']], function () {
    // Profile routes
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::post('/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password');
    });
    // Category routes
    Route::group(['prefix' => 'categories', 'middleware' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
        Route::post('/', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
        Route::post('/{slug}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
        Route::get('/{slug}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('categories.delete');
    });
    // Ingredient routes
    Route::group(['prefix' => 'ingredients', 'middleware' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\IngredientsController::class, 'index'])->name('ingredients');
        Route::post('/', [App\Http\Controllers\IngredientsController::class, 'create'])->name('ingredients.create');
        Route::post('/{id}', [App\Http\Controllers\IngredientsController::class, 'update'])->name('ingredients.update');
        Route::get('/{id}', [App\Http\Controllers\IngredientsController::class, 'delete'])->name('ingredients.delete');
    });
    // Users routes
    Route::group(['prefix' => 'users', 'middleware' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::post('/ban/{id}', [App\Http\Controllers\UserController::class, 'ban'])->name('users.ban');
        Route::post('/unban/{id}', [App\Http\Controllers\UserController::class, 'unban'])->name('users.unban');
    });
});
// Recipe routes
Route::group(['prefix' => 'recipes'], function () {
    Route::get('/', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes');
    Route::get('/{slug}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recipes.show');

    Route::group(['middleware' => ['verified', 'not.banned']], function () {
        Route::post('/', [App\Http\Controllers\RecipeController::class, 'create'])->name('recipes.create');
        Route::post('/{slug}', [App\Http\Controllers\RecipeController::class, 'update'])->name('recipes.update');
        Route::get('/{slug}/delete', [App\Http\Controllers\RecipeController::class, 'delete'])->name('recipes.delete');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::post('/approve/{id}', [App\Http\Controllers\RecipeController::class, 'approve'])->name('recipes.approve');
        Route::post('/disapprove/{id}', [App\Http\Controllers\RecipeController::class, 'disapprove'])->name('recipes.disapprove');
    });
});

// Other routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
