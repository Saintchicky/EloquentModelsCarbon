<?php

use Illuminate\Database\Seeder;
use App\UsersProfil;
use Carbon\Carbon;
class UsersProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersProfil::insert([
            'up_type' => 'Admin Technique',
            'up_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'up_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        UsersProfil::insert([
            'up_type' => 'Admin Fonctionnel',
            'up_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'up_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        UsersProfil::insert([
            'up_type' => 'Utilisateur',
            'up_created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'up_updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
