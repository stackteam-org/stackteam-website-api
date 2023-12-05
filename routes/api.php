<?php

use App\Http\Controllers\api\ArticleController;
use App\Http\Controllers\api\AuthorController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\TagController;
use App\Http\Controllers\api\TechnologyCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Consultation;
use App\Http\Controllers\CommingSoonAPI;
use App\Http\Controllers\ContentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function (){
    Route::post('/user/register',[\App\Http\Controllers\api\AuthController::class,'register']);
    Route::post('/user/login',[\App\Http\Controllers\api\AuthController::class,'login']);
});

Route::post('/content/wellcome',[ContentController::class,'wellcome']);

Route::resource('article',ArticleController::class)->only([
    'index', 'show'
]);
Route::get('/search', [ArticleController::class, 'searchArticles']);
Route::post('/set-like', [ArticleController::class, 'setLike']);
Route::resource('tag',TagController::class)->only(['index']); 
Route::resource('category',CategoryController::class)->only(['index']);
Route::get('/authors', [AuthorController::class, 'getAuthors']);
Route::get('/technologies', [TechnologyCategoryController::class, 'index']);
Route::get('/get-articles-by-category/{category_id}', [ArticleController::class, 'getArticlesByCategory']);