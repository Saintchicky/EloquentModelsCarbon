<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossiers extends Model
{
    protected $fillable = [
        'd_id','d_nom','d_prenom','d_agence_id'
    ];
    public function agences() 
    {
        return $this->belongsTo(Agences::class,'d_agence_id');
    } 
}
