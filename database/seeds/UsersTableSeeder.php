<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création d'une dizaine de fake utilisateurs
        $users = factory(App\User::class, 10)->create();
    }
}
