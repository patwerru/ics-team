<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
class PagesController extends Controller
{
   public function welcome(){
       if (Sentinel::check()){
           $userRoleName = Sentinel::getUser()->roles()->first()->slug;
           return redirect($userRoleName);
       }
       return view('Centaur::auth.login',[
       ]);
   }

    public function info(){
        return view('infor',[
        ]);
    }
}
