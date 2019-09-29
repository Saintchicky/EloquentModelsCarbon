<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agences;
use App\Dossiers;
use Carbon\Carbon;

class TestController extends Controller
{
    public function index()
    {
        $agences = Agences::all();
        $dossiers = Dossiers::all();
        return view('dossiers',compact('agences','dossiers'));
    }
    public function store(Request $request)
    {
        $dossier = new Dossiers();
        $dossier->fill($request->all());
        $dossier->save();
        return back();
    }
}
