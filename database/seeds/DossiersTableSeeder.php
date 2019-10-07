<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Dossiers;

class DossiersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dossiers::insert([
            'd_nom'=>'John',
            'd_prenom'=>'Doe',
            // Nombre au hasard entre 1 et 4
            'd_agence_id'=>rand(1,4),
            'd_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_date_deb'=>Carbon::now()->format('Y-m-d'),
            // Ajoute des jours à partir de la date du jour Carbon
            'd_date_fin'=>Carbon::now()->addDays(29)->format('d/m/Y')
        ]);
        Dossiers::insert([
            'd_nom'=>'Canillac',
            'd_prenom'=>'OlivierDate',
            'd_agence_id'=>rand(1,4),
            'd_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_date_deb'=>Carbon::now()->format('Y-m-d'),
            'd_date_fin'=>Carbon::now()->addDays(29)->format('d/m/Y')
        ]);
        Dossiers::insert([
            'd_nom'=>'Lavoye',
            'd_prenom'=>'OlivierCast',
            'd_agence_id'=>4,
            'd_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_date_deb'=>Carbon::now()->format('Y-m-d'),
            'd_date_fin'=>Carbon::now()->addDays(29)->format('d/m/Y'),
            'd_serialize'=>json_encode(['nom'=>'Lavoye','prenom'=>'OlivierCast','d_agence_id'=>4])
        ]);
        Dossiers::insert([
            'd_nom'=>'Gonzo',
            'd_prenom'=>'Patrice',
            'd_agence_id'=>rand(1,4),
            'd_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'd_date_deb'=>Carbon::now()->format('Y-m-d'),
            'd_date_fin'=>Carbon::now()->addDays(29)->format('d/m/Y'),
            'd_deleted_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
