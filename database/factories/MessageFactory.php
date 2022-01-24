<?php

namespace Database\Factories;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $entreprise = Entreprise::inRandomOrder()->first();
         $users= User::inRandomOrder()->first();
        return [
            'entreprises_id' => $entreprise->id,
            'message' => $this->faker->paragraph,
            'users_id' =>1,
        ];
    }
}
