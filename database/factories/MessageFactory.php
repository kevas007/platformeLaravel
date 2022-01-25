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
        $users= User::first();

        $rand = rand(0,200);
        if ($rand > 100) {
            $currentUser = $users->id;
        }else {
            $currentUser = $entreprise->users_id;
        }

        return [
            'entreprise_id' => $entreprise->id,
            'message' => $this->faker->paragraph,
            'user_id' => $currentUser,
        ];
    }
}
