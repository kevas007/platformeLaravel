<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'users_id' => $this->faker->numberBetween(2,3),
            'numero_de_TVA' => $this->faker->numberBetween(100000000,999999999),
            'nom_de_entreprise' => $this->faker->company,
            'activite_d_entreprise' => $this->faker->jobTitle,
            // 'email' => $this->faker->email,
            'adresse' => $this->faker->address(),
            'ville' => $this->faker->city,
            'pays' => $this->faker->country,
            'numero_fixe' => $this->faker->phoneNumber,
            'code_postal' => $this->faker->postcode,
            'email_de_la_personne_de_contact' => $this->faker->email,
            'nom_de_la_personne_de_contact' => $this->faker->name,
            'numero_de_la_personne_de_contact' => $this->faker->phoneNumber,


        ];
    }
}
