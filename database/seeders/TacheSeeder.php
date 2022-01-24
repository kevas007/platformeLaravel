<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $entreprises = Entreprise::inRandomOrder()->first();

        DB::table('taches')->insert(
            [
                [
                    'entreprises_id' => 1,
                    'nom' => 'Tache 1',
                    'description' => 'Description de la tache 1',
                    'statut_taches_id' => 1,
                ], [
                    'entreprises_id' => 1,
                    'nom' => 'Tache 2',
                    'description' => 'Description de la tache 2',
                    'statut_taches_id' => 1,
                ], [
                    'entreprises_id' => 2,
                    'nom' => 'Tache 3',
                    'description' => 'Description de la tache 3',
                    'statut_taches_id' => 2,
                ],
                [
                    'entreprises_id' =>2,
                    'nom_de_la_tache' => 'Tache 4',
                    'description_de_la_tache' => 'Description de la tache 3',
                    'statut_taches_id' => 2,
                ],
                [
                    'entreprises_id' => 1,
                    'nom_de_la_tache' => 'Tache 5',
                    'description_de_la_tache' => 'Description de la tache 3',
                    'statut_taches_id' => 1,
                ]
            ]
        );
    }
}
