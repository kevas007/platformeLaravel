<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutTacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_taches')->insert([
            [
                'nom_du_statut' => 'open',
            ],[
                'nom_du_statut' => 'done',
            ]
        ]);
    }
}
