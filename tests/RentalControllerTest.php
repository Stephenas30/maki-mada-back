<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Voiture;
use App\Models\Client;
use App\Http\Requests\CreateLocationRequest;
use App\Http\Controllers\LocationVoitureController;

class RentalControllerTest extends TestCase
{
    /** @test */
    public function it_can_create_a_new_rental()
    {
        // Créer des données simulées
        $voiture = Voiture::factory()->create();
        $client = Client::factory()->create();

        // Envoyer une demande POST pour créer une nouvelle location
        // Créer une instance du contrôleur
        $controller = new LocationVoitureController();

        // Créer une fausse requête avec des données de test
        $request = new CreateLocationRequest([
            'voiture_id' => $voiture->id,
            'client_id' => $client->id,
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
        ]);

        // Appeler la méthode du contrôleur à tester
        $response = $controller->createRental($request);

        // Assurez-vous que la redirection est effectuée après la création de la location
        //$response->assertStatus(302);

        // Vérifier que la location a été créée dans la base de données
        $this->assertDatabaseHas('locations', [
            'voiture_id' => $voiture->id,
            'client_id' => $client->id,
            'date_depart' => '2024-02-15 08:00:00',
            'date_retour' => '2024-02-20 20:00:00',
            'lieu_depart' => 'Majunga',
            'lieu_retour' => 'Tana',
            'lieu_depart_detaille' => 'Amborovia',
            'lieu_retour_detaille' => 'Ivato',
            'hotel' => 'Brazzers',
            'souhait' => 'Je veux un bisou',
            'lieu_retour' => 'Tana',
            'assurance' => 'ABC',
            'payement' => 'VISA',
        ]);
    }
    
}
