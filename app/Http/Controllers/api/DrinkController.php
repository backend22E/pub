<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Http\Resources\Drink as DrinkResource;
use App\Http\Controllers\api\ResponseController;
use App\Http\Requests\DrinkRequest;

class DrinkController extends ResponseController {

    public function getDrinks() {

        $drinks =Drink::with( "type", "package" )->get();

        return $this->sendResponse( DrinkResource::collection( $drinks ), "Adat betöltve" );
    }

    public function getDrink( Request $request ) {

        $drink = Drink::where( "drink", $request[ "drink" ] )->first();
        if( is_null( $drink )) {

                return $this->sendError( "Adathiba", "Nincs ilyen ital" );

        }else {

            return $this->sendResponse( $drink, "Betöltve" );
        }

    }

    public function newDrink( DrinkRequest $request ) {

        $request->validated();

        $drink = new Drink();
        $drink->drink = $request[ "drink" ];
        $drink->amount = $request[ "amount" ];
        $drink->type_id = ( new TypeController )->getTypeId( $request[ "type" ]);
        $drink->package_id = ( new PackageController )->getPackageId( $request[ "package" ] );

        $drink->save();

        return $this->sendResponse( $drink, "Ital felvéve" );
    }

    public function updateDrink( Request $request ) {

        $drink = Drink::find( $request[ "id" ]);

        $drink->drink = $request[ "drink" ];
        $drink->amount = $request[ "amount" ];
        $drink->type_id = ( new TypeController )->getTypeId( $request[ "type" ]);
        $drink->package_id = ( new PackageController )->getPackageId( $request[ "package" ] );

        $drink->update();

        return $this->sendResponse( new DrinkResource( $drink ), "Ital módosítva" );
    }

    public function destroyDrink( Request $request ) {

        $drink = Drink::find( $request[ "id" ]);
        if( !is_null( $drink )) {

            $drink->delete();
            return $this->sendResponse( new DrinkResource( $drink ), "Ital törölve" );

        }else {

            return $this->sendError( "Adathiba", "Nincs ilyen ital" );
        }



    }
}
