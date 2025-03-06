<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AllertMail;

class MailController extends Controller {

    public function sendMail( $user, $time ) {

        $content = [

            "title" => "Figyelmeztetés",
            "user" => $user,
            "time" => $time
        ];

        Mail::to( "laravelfejlesztes@gmail.com" )->send( new AllertMail( $content ));
    }
}
