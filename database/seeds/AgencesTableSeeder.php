<?php

use Illuminate\Database\Seeder;
use App\Agences;
use Carbon\Carbon;
class AgencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Agences::insert([
            'ag_nom' => 'Agence Vincennes',
            'ag_cp' => '94300',
            'ag_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'ag_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);

    Agences::insert([
            'ag_nom' => 'Agence Montreuil',
            'ag_cp' => '93100',
            'ag_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'ag_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    Agences::insert([
            'ag_nom' => 'Agence Paris 11',
            'ag_cp' => '75011',
            'ag_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'ag_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);

    Agences::insert([
            'ag_nom' => 'Agence Boulogne',
            'ag_cp' => '92100', 
            'ag_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'ag_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
