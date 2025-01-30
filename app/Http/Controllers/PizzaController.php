<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller {

    public function getPizzas() {

        $pizzas = DB::table( "pizzas" )->get();

        return $pizzas;
    }

    public function getPizza() {

        //$pizza = DB::table( "pizzas" )->select( "pizza", "price" )->get();
        $pizza = DB::table( "pizzas" )->where( "pizza", "Szalámis" )->select( "pizza", "price" )->first();

        return $pizza;
    }

    public function createPizza() {

        $id = DB::table( "pizzas" )->insertGetId(
            [
                "pizza" => "Natur",
                "price" => 1400
            ]
        );

        return $id;
    }

    public function setPizza() {

        //updateOrInsert
        $result = DB::table( "pizzas" )->where( "pizza", "Halas" )->update(
            [
                "price" => 1500
            ]);

        return $result;
    }

    public function destroyPizza() {

        $result = DB::table( "pizzas" )->where( "pizza", "Halas" )->delete();

        return $result;
    }

    public function getDrinksFromDb() {

        $drinks = DB::table( "drinks" )->select( "drink", "type", "package" )
        ->join( "types", "drinks.type_id", "=", "types.id" )
        ->join( "packages", "drinks.package_id", "=", "packages.id" )->get();

        return $drinks;
    }
}
