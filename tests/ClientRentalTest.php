<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientRentalTest extends TestCase
{
    /** @test */
    public function it_can_create_a_new_client()
    {
        // Créer un nouveau client
        $car = new Client();
        $car->nom = 'Stephanas';
        $car->prenom = 'Joel';
        $car->adresse = 'H 14 Sab-Nam';
        $car->ville = 'Antananarivo';
        $car->email = 'stephanas.dev';
        $car->numero = '+261 32 21 142 88';
        $car->pays = 'Madagascar';
        $car->save();

        // Vérifier que la voiture a été créée avec succès
        $this->assertDatabaseHas('clients', [
            'nom' => 'Stephanas',
            'prenom' => 'Joel',
            'adresse' => 'H 14 Sab-Nam',
            'ville' => 'Antananarivo',
            'email' => 'stephanas.dev',
            'numero' => '+261 32 21 142 88',
            'pays' => 'Madagascar',
        ]);
    }
}
