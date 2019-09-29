<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossiers extends Model
{
    protected $fillable = [
        'd_id','d_nom','d_prenom','d_agence_id'
    ];
    //Carbon est déjà initialisé 
    // would add sommething quoting Laravel Documentation for googlers to add how you can transform your SQL datetime fields into Carbon objects:

    //     In your Model:
        
    //     protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];
        
    //     All the fields present on this array will be automatically accessible in your views with Carbon functions like:
        
        
   // protected $dates = ['created_at', 'updated_at'];
    // Le dossier appartient à l'agence
    public function agences() 
    {
        return $this->belongsTo(Agences::class,'d_agence_id');
    } 
}
