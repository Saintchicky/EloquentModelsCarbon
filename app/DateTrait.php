<?php

namespace App;
use Carbon\Carbon;


trait DateTrait
{
    // ReFormarter la date avec un accessor
    // Mettre entre le get____________Attribute le nom de la nouvelle variable modifiée
    // En Mettant chaque Mot avec une Majuscule pour faire par exemple : dossier_created_at
    // C'est une méthode d'affichage
    public function getFormatCreatedAtAttribute()
    {
        // Récupère la date depuis le model
        $date = $this->dateFromModel();
        return $date->format('d/m/Y');
    }
    public function getDateSinceAttribute()
    {
        // Récupère la date depuis le model
        $date = $this->dateFromModel();
        // Récupèrer le fr pour l'affichage
        Carbon::setLocale('fr');
        // Afficher depuis
        $since = $date->diffForHumans();
        return $since;
    }
}