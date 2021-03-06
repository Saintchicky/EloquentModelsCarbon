<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Dossiers extends Model
{
    // Appel du trait softDeletes et DateTrait
    use SoftDeletes,
        DateTrait;
    // Changer le nom de l'id et indiquer à Eloquent que ce n'est plus id par défaut
    protected $primaryKey = 'd_id';
    // Renseigner les champs de la table pour utiliser la méthode fill()
    protected $fillable = [
        'd_nom','d_prenom','d_agence_id','d_date_deb','d_date_fin','d_serialize'
    ];
    // Déclarer lec colonnes dates pour Eloquent
    protected $dates = ['d_created_at', 'd_updated_at','d_deleted_at','d_date_deb'];
    // Réassigner les dates pour les traitements via Eloquent
    const CREATED_AT = 'd_created_at';
    const UPDATED_AT = 'd_updated_at';
    const DELETED_AT = 'd_deleted_at';
    //----------------------------------------------------------------

    // Permet de serializer en Json lors de l'insert ds la bdd
    // Lors de l'affichage, Eloquent convertit le serialize en array
    protected $casts = [
        'd_serialize' => 'array',
    ];
    //The supported cast types are: integer, real, float, double, decimal:<digits>, string, boolean, object, array, collection, date, datetime, and timestamp. 
    //When casting to decimal, you should define the number of digits, eg. decimal:2
    // ex:  'is_admin' => 'boolean',

    /* $casts DATE :
    
    When using the date or datetime cast type, you may specify the date's format. 
    This format will be used when the model is serialized to an array or JSON:
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
    ];    */


    //----------------------------------------------------------------
    // Pour Eviter la duplication de code on peut passer par un trait avec des méthodes Génériques pour le formatage des dates
    protected function dateFromModel()
    {
        return $this->d_created_at;
    }
    //----------------------------------------------------------------

    // Mutator,  ici on doit mettre entre le set____________Attribute le nom de la variable à modifier
    // Puis on assigne la valeur à modifier avec $this->attribute['nom_de_la_colonne']
    // Cela permet de modifier une valeur avant insertion en BDD
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
    //Reformater la date deb avant insertion base
    public function setDDateDebAttribute($value)
    {
        // Transforme la donnée du questionnaire au format date avant insertion BDD si format Date ds BDD
        $this->attributes['d_date_deb'] = Carbon::createFromFormat('Y-m-d', $value);
    }
    
    //----------------------------------------------------------------
    // Relation 1:1 avec Dossiers->agences
    // Le dossier appartient à l'agence
    public function agences() 
    {
        // On relie la clé étrangère de dossiers à l'id de l'agence et eloquent fait le match
        // Paramètre public function belongsTo($related, $foreignKey = null, $otherKey = null, $relation = null)
        return $this->belongsTo(Agences::class,'d_agence_id');
    } 
}
