<?php

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

Route::post('/consultation/store', Consultation::class);
Route::any('/comming-soon', CommingSoonAPI::class);

<<<<<<< HEAD
Route::prefix('v1')->group(function (){
    Route::post('/user/register',[\App\Http\Controllers\api\AuthController::class,'register']);
    Route::post('/user/login',[\App\Http\Controllers\api\AuthController::class,'login']);
});


=======
Route::get('/content',ContentController::class);
>>>>>>> 271e758 (some change on Route | add content api)
