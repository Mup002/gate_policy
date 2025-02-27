<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user',[UserController::class,'getAllUsers'])
    ->middleware('check.token.expiration','permission:admin-view');
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/article/create',[ArticleController::class,'createArticle'])
    ->middleware('check.token.expiration','permission:author-create');
    Route::put('/article/edit/{id}',[ArticleController::class,'updateArticle'])
    ->middleware('check.token.expiration','permission:author-edit');
});
