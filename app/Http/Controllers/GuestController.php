<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function guestLoging(){
        return view('guests.dashboard',[

        ]);
    }
}
