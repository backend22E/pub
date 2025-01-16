<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DrinkController;
use App\Http\Controllers\api\TypeController;
use App\Http\Controllers\api\AuthController;

Route::post( "/register", [ AuthController::class, "register" ]);
Route::post( "/login", [ AuthController::class, "login" ]);
Route::post( "/logout", [ AuthController::class, "logout" ]);
Route::get( "/users", [ AuthController::class, "getUsers" ]);

Route::get( "/drinks", [ DrinkController::class, "getDrinks" ]);
Route::get( "/drink", [ DrinkController::class, "getDrink" ]);
Route::post( "/newdrink", [ DrinkController::class, "newDrink" ]);
Route::put( "/updatedrink", [ DrinkController::class, "updateDrink" ]);
Route::delete( "/deletedrink", [ DrinkController::class, "destroyDrink" ]);

Route::get( "/types", [ TypeController::class, "getTypes" ]);
Route::post( "/newtype", [ TypeController::class, "newType" ]);
Route::put( "/updatetype", [ TypeController::class, "modifyType" ]);
Route::delete( "/deletetype", [ TypeController::class, "destroyType" ]);
