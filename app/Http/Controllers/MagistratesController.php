<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MagistratesController extends Controller
{
    public function welcome(){
        return view('magistrate.dashboard',[

        ]);
    }

    public function user_list(){
        $users = User::all();
        return view('magistrate.view-users',[
            'users'=>$users,
        ]);
    }
}
