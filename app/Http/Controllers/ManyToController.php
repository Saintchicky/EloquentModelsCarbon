<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManyToController extends Controller
{
    public function show()
    {
        $users = User::find(1);
        foreach($users->users_profils as $profil){
            dd($profil->up_type);
        }
       
        return view('manyto',compact('users'));
    }
}
