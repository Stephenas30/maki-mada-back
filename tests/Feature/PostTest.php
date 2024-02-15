<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\CreateLocationRequest;
use App\Http\Controllers\LocationVoitureController;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateRental()
    {
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);
        // Préparation des données de test
        $requestData = [
            'voiture_id' => 18,
            'client_id' => 18,
            'date_depart' => '2024-02-15 08:00:00',
            'date_retour' => '2024-02-20 20:00:00',
            'lieu_depart' => 'Majunga',
            'lieu_retour' => 'Tana',
            'lieu_depart_detaille' => 'Amborovia',
            'lieu_retour_detaille' => 'Ivato',
            'hotel' => 'Brazzers',
            'souhait' => 'Je veux un bisou',
            'assurance' => 'ABC',
            'payement' => 'VISA'
        ];

        // Exécution de la requête POST
        $response = $this->postJson('/api/location/create', $requestData);

        // Assertion sur le statut de la réponse
        $response->assertStatus(200); // Vous pouvez ajuster selon le statut attendu après une redirection
    }
}
