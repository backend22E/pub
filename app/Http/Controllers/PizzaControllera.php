<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller {

    public function getPizzas() {

        $pizzas = DB::select("select * from pizzas" );

        return $pizzas;
    }

    public function getPizza( $price ) {

        $pizza = DB::select( "SELECT * FROM pizzas WHERE price = $price" );

        return $pizza;
    }

     public function createPizza( $pizza, $price ) {

        $pizza = DB::insert( "INSERT INTO pizzas( pizza, price ) VALUES " .
                            "(?,?)",
            [ $pizza, $price ]);

        return $pizza;
     }

    public function setPizza() {

        $result = DB::update( "update pizzas set price = 1400 where pizza = \"Halas\"" );

        return $result;
    }

    public function destroyPizza() {

        $result = DB::delete( "delete from pizzas where pizza = \"Halas\"");

        return $result;
    }
}
