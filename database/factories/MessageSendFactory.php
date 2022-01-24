<?php

namespace Database\Factories;

use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageSendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $entreprise = Entreprise::inRandomOrder()->first();
        return [
            'entreprises_id' => $entreprise->id,
        ];
    }
}
