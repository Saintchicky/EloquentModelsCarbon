<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManyToController extends Controller
{
    public function show()
    {
        $users = User::with('users_profils')->get();
        dd($users);
        return view('manyto',compact('users'));
    }
}
