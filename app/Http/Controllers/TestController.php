<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Agences;
use App\Dossiers;
use Carbon\Carbon;

class TestController extends Controller
{
    public function showSoftDelete()
    {
        $agences = Agences::all();
        // Liste avec et sans les softDeletes
        $dossiers_tout = Dossiers::withTrashed()->get();
        //Liste des dossiers sans les softDeletes
        $dossiers_sans_soft_delete = Dossiers::all();
        //Liste des dossiers avec les softDeletes
        $dossiers_soft_delete =  Dossiers::onlyTrashed()->get();
        // Equivalent du render du twig
        return view('dossiers',compact('agences','dossiers_tout','dossiers_sans_soft_delete','dossiers_soft_delete'));
    }
    public function showBelongsTo()
    {
        $agences = Agences::all();
        //Liste des dossiers sans les softDeletes
        $dossiers = Dossiers::all();
        $dossier = Dossiers::where('d_prenom','OlivierCast')->first();
        $dossier_seria = $dossier->d_serialize;
        return view('belongsto',compact('agences','dossiers','dossier_seria'));
    }
    public function showCarbon()
    {
        $agences = Agences::all();
        // Liste des dossiers sans les softDeletes
        $dossiers = Dossiers::all();
        $dossier = Dossiers::where('d_prenom','Doe')->first();
       
        
        // Operateur de comparaison Carbon
        // eq() equals
        // ne() not equals
        // gt() greater than
        // gte() greater than or equals
        // lt() less than
        // lte() less than or equals

        // Doc Carbon https://carbon.nesbot.com/docs/
  
        // Exemple de date format Carbon pour la vue, $dossier->d_created_at vient de la bdd mais n'a pas
        // besoin d'être formaté

        $carbon_created_at = Carbon::parse($dossier->d_created_at);
        // Récupère la date d'aujourd'hui
        $carbon_today = Carbon::today();
        // Comparaison entre date d'aujourd'hui et date de création
        if($carbon_today->gt($dossier->d_created_at)){
            $resultDateGt = "La date d'aujourd'hui est plus grande que celle crée en base";
        }else{
            $resultDateGt ="La date d'aujourd'hui n'est pas aussi grande que celle crée";
        }
        if($carbon_today->lt($dossier->d_created_at)){
            $resultDateLt = "La date d'aujourd'hui est inférieure à celle crée en base";
        }else{
            $resultDateLt = "La date d'aujourd'hui est plus grande que celle crée en base";
        }   
         // Compteur de jour avant échéance (diffIndDays->Carbon):
        $dossier_date_range = Dossiers::where('d_prenom','OlivierDate')->first();
        $date_deb = $dossier_date_range->d_date_deb;
        //Il faut remplacer les "/" par "-" pour avoir une date type : 17/10/2019
        $date_fin_replace = str_replace('/','-',$dossier_date_range->d_date_fin);
        // Carbon formate la date texte en date 2019-10-17
        $date_fin =  Carbon::parse($date_fin_replace);
        // Fais la différence entre les jours
        $total_days = $date_fin->diffInDays($date_deb);
        // Mis à jour en temps réel avec today
        $rest_days = $date_deb->diffInDays($carbon_today);
      
        return view('carbon',compact('agences','dossiers','carbon_created_at','carbon_today','resultDateGt','resultDateLt','total_days','rest_days'));
    }
    // Insertion des données en bdd
    public function store(Request $request)
    {
      
        $dossier = new Dossiers();
        // Prend toutes les fillables déclarées
        $dossier->fill($request->all());
        $seria_info = ['nom'=>$request->d_nom,'prenom'=>$request->d_prenom,'d_agence_id'=>$request->d_agence_id];
        $dossier->d_serialize = $seria_info;
        $dossier->save();
        return back();
    }
    public function storeDate(Request $request)
    {
        // Point d'entrée scan pour le début de la requête
        \DB::connection()->enableQueryLog();
        $dossier = new Dossiers();
        // Prend toutes les fillables déclarées
        $dossier->fill($request->all());
        $dossier->save();

        //Récupère la requête en Log
        $queries = DB::getQueryLog();
        // Obtenir le nom de la table
        $table_name = $dossier->getTable();
        $today = Carbon::today()->format('Ymd');
       
        // Génerer un patch SQL
        foreach($queries as $db){
            $query = $db['query'];
            $bindings = $db['bindings'];
            // Retire les ? de la query pour ajouter les valeurs
            $arr = explode('?',$query);
            $res = '';
            foreach($arr as $idx => $ele){
                if($idx < count($arr) - 1){
                    $res = $res.$ele."'".$bindings[$idx]."'";
                    }
            }
        }
        // Requête Prête
        $res = $res.$arr[count($arr) -1];
        
        $path =  app_path('data/'.$today.'_patch_'.$table_name.'.sql');
        // Si le fichier n'existe pas on le crée
        if(!file_exists($path)){
            $first =  'insert Into Début;'. PHP_EOL .$res.';'. PHP_EOL.'insert Into Fin;'. PHP_EOL;
            File::prepend(app_path('data/'.$today.'_patch_'.$table_name.'.sql'),
            $first); //.PHP_EOL à la ligne
            
        }else{
            // On ouvre le fichier en tableau
            $lines = file(app_path('data/'.$today.'_patch_'.$table_name.'.sql'));
            // on cherche la dernière ligne
            $last = sizeof($lines) - 1 ; 
            // On efface la dernière ligne
            unset($lines[$last]); 
            // On ouvre le fichier en écriture seule (paramètre,'w')
            $fp = fopen(app_path('data/'.$today.'_patch_'.$table_name.'.sql'),'w');
            // On écrase et on écrit
            fwrite($fp, implode('', $lines));
            // On ferme le fichier
            fclose($fp);
            // On ajoute la requête supplémentaire avec celle de fin
            $add = $res.';'. PHP_EOL.'insert Into Fin;'. PHP_EOL;
            // Ajoute à la ligne suivante
            File::append(
                app_path('data/'.$today.'_patch_'.$table_name.'.sql'),
                $add
            );
        }

        // Envoi en message dans view Carbon
        return back()->with('success',json_encode($queries));
    }
    // Suppréssion douce
    public function softdelete($d_id)
    {
        $dossier = Dossiers::destroy($d_id);
        return back();
    }
    // Restoration 
    public function restore($d_id)
    {
        //Appel seulement les sofDelete
        $dossier = Dossiers::onlyTrashed()->find($d_id);
        $dossier->restore();
        return back();
    }

}
