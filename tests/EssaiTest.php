<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EssaiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $requestData = [
            'nom_voiture' => 'Subaru Impreza',
            'boite' => 'Manuelle',
            'tarif' => '550',
            'frais_livraison' => '75',
            'place' => '4',
            'coffre' => 2,
            'porte' => 3,
            'radio' => 'MP3',
            'puissance' => '650 cv',
            'dispo' => 1,
            'clim' => 0,
            'gps' => 0,
            'rehausseur' => 0,
            'bebe' => 0,
            'traction' => 0,
            'decapotable' => 0,
            'utilitaire' => 0,
            'lieu_dispo' => 'Antananarivo'
        ];

        // Exécution de la requête POST
        $response = $this->postJson('/api/voiture/create', $requestData);

        // Assertion sur le statut de la réponse
        $response->assertStatus(200); // Vous pouvez ajuster selon le statut attendu après une redirection
    }
}
