<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dossiers extends Model
{
    // Appel du trait softDeletes et DateTrait
    use SoftDeletes,
        DateTrait;
    // Changer le nom de l'id et indiquer à Eloquent que ce n'est plus id
    protected $primaryKey = 'd_id';
    // Rensigner les champs de la table pour utiliser la méthode fill()
    protected $fillable = [
        'd_nom','d_prenom','d_agence_id'
    ];
    // Déclarer lec colonnes dates pour Eloquent
    protected $dates = ['d_created_at', 'd_updated_at','d_deleted_at'];
    // Réassigner les dates pour les traitements via Eloquent
    const CREATED_AT = 'd_created_at';
    const UPDATED_AT = 'd_updated_at';
    const DELETED_AT = 'd_deleted_at';
    
    //----------------------------------------------------------------
    // Pour Eviter la duplication de code on peut passer par un trait avec des méthodes Génériques pour le formatage des dates
    protected function dateFromModel()
    {
        return $this->d_created_at;
    }
    //----------------------------------------------------------------

    // Mutator,  ici on doit mettre entre le set____________Attribute le nom de la variable à modifier
    // Puis on assigne la valeur à modifier avec $this->attribute['nom_de_la_colonne']
    public function setDNomAttribute($value)
    {
        // Met toutes les lettres en Majuscule
        $this->attributes['d_nom'] = strtoupper($value);
    }
    public function setDPrenomAttribute($value)
    {
        // Met la première lettre en Majuscule
        $this->attributes['d_prenom'] = ucfirst ($value);
    }
    //----------------------------------------------------------------
    // Le dossier appartient à l'agence
    public function agences() 
    {
        // On relie la clé étrangère de dossiers à l'id de l'agence et eloquent fait le match
        return $this->belongsTo(Agences::class,'d_agence_id');
    } 
}
