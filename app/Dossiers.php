<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dossiers extends Model
{
    //Appel du trait softDeletes
    use SoftDeletes;
    protected $primaryKey = 'd_id';
    protected $fillable = [
        'd_nom','d_prenom','d_agence_id'
    ];
    protected $dates = ['d_created_at', 'd_updated_at','d_deleted_at'];
    const CREATED_AT = 'd_created_at';
    const UPDATED_AT = 'd_updated_at';
    const DELETED_AT = 'd_deleted_at';
    //Carbon est déjà initialisé 
    // would add sommething quoting Laravel Documentation for googlers to add how you can transform your SQL datetime fields into Carbon objects:

    //     In your Model:
        
    //     protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];
        
    //     All the fields present on this array will be automatically accessible in your views with Carbon functions like:
        
        
   // protected $dates = ['created_at', 'updated_at'];
    // Le dossier appartient à l'agence
    public function agences() 
    {
        // On relie la clé étrangère de dossiers à l'id de l'agence et eloquent fait le match
        return $this->belongsTo(Agences::class,'d_agence_id');
    } 
}
