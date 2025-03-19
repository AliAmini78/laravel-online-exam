<?php


use Api\User\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminUserController::class)->group(function (){
    Route::get('/index' , "index");
    Route::get('/show/{user}' , "show");
    Route::post('/create' , "create");
});
