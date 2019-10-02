<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agences;
use App\Dossiers;
use Carbon\Carbon;

class TestController extends Controller
{
    public function showBelongsTo()
    {
        $agences = Agences::all();
        //Liste des dossiers sans les softDeletes
        $dossiers = Dossiers::all();
        return view('belongsto',compact('agences','dossiers'));
    }
    public function showSoftDelete()
    {
        $agences = Agences::all();
        //Liste des dossiers sans les softDeletes
        $dossiers = Dossiers::all();
        //Liste des dossiers avec les softDeletes
        $dossiers_soft_delete =  Dossiers::onlyTrashed()->get();
        return view('dossiers',compact('agences','dossiers','dossiers_soft_delete'));
    }
    public function store(Request $request)
    {
        $dossier = new Dossiers();
        $dossier->fill($request->all());
        $dossier->save();
        return back();
    }
    public function softdelete($d_id)
    {
        $dossier = Dossiers::destroy($d_id);
        return back();
    }
    public function restore($d_id)
    {
        //Appel seulement les sofDelete
        $dossier = Dossiers::onlyTrashed()->find($d_id);
        $dossier->restore();
        return back();
    }

}
