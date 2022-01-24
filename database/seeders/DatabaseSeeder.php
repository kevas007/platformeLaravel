<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use App\Models\Message;
use App\Models\MessageSend;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
        ]);
        Entreprise::factory(2)->create();
        $this->call([
            StatutTacheSeeder::class,
            TacheSeeder::class,
        ]);
        Message::factory(10)->create();
     
    }
}
