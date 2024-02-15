<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $boite = ['Manuelle', 'Automatique'];
        return [
            'nom_voiture' => 'Peugeot 206',
            'boite' => $this->faker->randomElement($boite),
            'tarif' => $this->faker->numberBetween(150, 800),
            'frais_livraison' => $this->faker->numberBetween(15, 50),
            'place' => '4+1',
            'coffre' => $this->faker->numberBetween(1, 4),
            'porte' => $this->faker->numberBetween(3, 5),
            'radio' => Str::random(3),
            'puissance' => Str::random(5),
            'dispo' => false,
            'clim' => false,
            'gps' => false,
            'rehausseur' => false,
            'bebe' => false,
            'traction' => false,
            'decapotable' => false,
            'utilitaire' => false,
        ];
    }
}
