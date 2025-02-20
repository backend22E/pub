<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\api\ResponseController;
use Illuminate\Support\Facades\Gate;

class UserController extends ResponseController {

    public function getUsers() {

        if( !Gate::allows( "super" )) {

            return $this->sendError( "Azonosítási hiba", "Nincs jogosultság", 401 );
        }
        $users = User::all();

        return $this->sendResponse( $users, "Felhasználók:" );
    }

    public function setAdmin( Request $request ) {

        if( !Gate::allows( "super" )) {

            return $this->sendError( "Azonosítási hiba", "Nincs jogosultság", 401 );
        }

        $user = User::find( $request[ "id" ]);
        $user->admin = 1;

        $user->update();

        return $this->sendResponse( $user->name, "Admin jog megadva" );
    }
}
