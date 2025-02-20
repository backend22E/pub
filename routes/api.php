<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DrinkController;
use App\Http\Controllers\api\TypeController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\api\UserController;

Route::middleware( "auth:sanctum" )->group( function(){

    Route::post( "/logout", [ AuthController::class, "logout" ]);
    Route::get( "/users", [ UserController::class, "getUsers" ]);
    Route::post( "/admin", [ UserController::class, "setAdmin" ]);

    Route::get( "/drinks", [ DrinkController::class, "getDrinks" ]);
    Route::get( "/drink", [ DrinkController::class, "getDrink" ]);
    Route::post( "/newdrink", [ DrinkController::class, "newDrink" ]);
    Route::put( "/updatedrink", [ DrinkController::class, "updateDrink" ]);
    Route::delete( "/deletedrink", [ DrinkController::class, "destroyDrink" ]);

    Route::get( "/types", [ TypeController::class, "getTypes" ]);
    Route::post( "/newtype", [ TypeController::class, "newType" ]);
    Route::put( "/updatetype", [ TypeController::class, "modifyType" ]);
    Route::delete( "/deletetype", [ TypeController::class, "destroyType" ]);


});

Route::post( "/register", [ AuthController::class, "register" ]);
Route::post( "/login", [ AuthController::class, "login" ]);



Route::get( "/pizzak", [ PizzaController::class, "getPizzas" ]);
Route::get( "/pizza", [ PizzaController::class, "getPizza" ]);
Route::post( "/createpizza", [ PizzaController::class, "createPizza" ]);
Route::post( "/updatepizza", [ PizzaController::class, "setPizza" ]);
Route::post( "/deletepizza", [ PizzaController::class, "destroyPizza" ]);
Route::get( "/drinkdb", [ PizzaController::class, "getDrinksFromDb" ]);
