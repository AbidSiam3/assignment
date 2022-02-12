<?php

use Illuminate\Http\Request;
use app\Http\Controllers\MongoUserController;


Route::apiResource("users", "MongoUserController");
Route::post("/refresh", "RefreshController");
