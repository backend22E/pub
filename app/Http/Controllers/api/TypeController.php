<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Controllers\api\ResponseController;
use App\Http\Resources\Type as TypeResource;
use App\Http\Requests\TypeRequest;

class TypeController extends ResponseController {

    public function getTypes() {

        $types = Type::all();

        return $this->sendResponse( TypeResource::collection( $types ), "Típusok betöltve");
    }

    public function newType( TypeRequest $request ) {

        $request->validated();

        $type = new Type();
        $type->type = $request[ "type" ];
        $type->save();

        return $this->sendResponse( new TypeResource( $type ), "Típus kiírva");
    }

    public function modifyType( TypeRequest $request ) {

        $request->validated();

        $type = Type::find( $request[ "id" ] );
        $type->type = $request[ "type" ];

        $type->update();

        return $this->sendResponse( new TypeResource( $type ), "Típus módosítva");
    }

    public function destroyType( Request $request ) {

        $type = Type::find( $request[ "id" ]);
        if( !is_null( $type )) {

            $type->delete();

            return $this->sendResponse( $type, "Típus törölve.");

        }else {

            return $this->sendError( "Adathiba", "Nincs ilyen típus", 406 );
        }
    }

    public function getTypeId( $typeName ) {

        $type = Type::where( "type", $typeName )->first();

        return $type->id;
    }
}
