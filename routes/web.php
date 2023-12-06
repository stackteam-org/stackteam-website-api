<?php

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
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
    return view('welcome');
});

Route::group(['prefix' => 'dashboard','as' => 'dashboard.' ,'middleware' => ['auth','verified']], function() {
    Route::get('/', function() {return view('dashboard');});
    Route::resource('article', ArticleController::class);

//    Route::resource('/profile', UserProfileController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edite', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix'=> 'admin','as'=> 'admin','middleware'=> ['auth']], function() {
});

require __DIR__.'/auth.php';
