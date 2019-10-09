<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\User;
use App\UsersProfil;
use Carbon\Carbon;

class ManyToController extends Controller
{
    public function show()
    {
        
        // Le with permet de faire la relation avec la table users_profils
        $users = User::with('users_profils')->get();
        $profils = UsersProfil::all();
        $user_unique = User::find(1);
        return view('manyto',compact('users','profils','user_unique'));
    }
    public function store(Request $request)
    {
        // Point d'entrée scan pour le début de la requête
        \DB::connection()->enableQueryLog();

        $user = User::find($request->us_user_id);
        // Récupère l'id de l'user et l'attache l'id du profil ds table settings
        $user->users_profils()->attach($request->us_profil_id);

        //Récupère la requête en Log
        $queries = DB::getQueryLog();
        // Obtenir le nom de la table
        $table_name = $user->getTable();
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

        return back();
    }
    public function update(Request $request)
    {
        // Point d'entrée scan pour le début de la requête
        \DB::connection()->enableQueryLog();

        $user = User::find($request->id);
        // updateExistingPivot en 1er paramètre l'id du user et en deuxième un tableau avec le nom de la colonne et la valeur mise à jour
        $user->users_profils()->updateExistingPivot($user->id, ['us_profil_id' => $request->us_profil_id]);
        // On fait un sync on écrase la précédente la ligne existante pour en créer une nouvelle
        // $user->users_profils()->sync($request->us_profil_id);

        //Récupère la requête en Log
        $queries = DB::getQueryLog();
        // Obtenir le nom de la table
        $table_name = $user->getTable();
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

        return back();
    }
}
