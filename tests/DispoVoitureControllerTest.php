<?php

namespace Tests\Feature;

use App\Models\Voiture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DispoVoitureControllerTest extends TestCase
{
    //use RefreshDatabase; // Réinitialise la base de données avant chaque test

    /**
     * Test pour vérifier la récupération des voitures disponibles.
     *
     * @return void
     */
    public function testGetAvailableVoitures()
    {
        // Exécute la requête GET vers votre endpoint
        $response = $this->get('/api/voitures/show?dispo=1&lieu_dispo=Antananarivo');

        // Vérifie que la réponse est un succès (code 200)
        $response->assertStatus(200);
        dump($response->json());
        // Vérifie que la réponse contient les détails des voitures disponibles
        $response->assertJsonStructure([
            '*' => ['voiture_id', 'nom_voiture', 'boite', 'tarif','dispo'] // Vérifie la structure de chaque élément de la liste
        ]);
    }
}
