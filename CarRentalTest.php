<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Voiture;

class CarRentalTest extends TestCase
{
    /** @test */
    public function it_can_create_a_new_car()
    {
        // Créer une nouvelle voiture
        $car = new Voiture();
        $car->nom_voiture = 'Peugeot 206';
        $car->boite = 'Manuelle';
        $car->tarif = '260';
        $car->frais_livraison = '35';
        $car->place = '4+1';
        $car->coffre = 2;
        $car->puissance = '150 cv';
        $car->porte = 3;
        $car->radio = 'MP3';
        $car->dispo = false;
        $car->clim = false;
        $car->gps = false;
        $car->rehausseur = false;
        $car->bebe = false;
        $car->traction = false;
        $car->decapotable = false;
        $car->utilitaire = false;
        $car->save();

        // Vérifier que la voiture a été créée avec succès
        $this->assertDatabaseHas('voitures', [
            'nom_voiture' => 'Peugeot 206',
            'boite' => 'Manuelle',
            'tarif' => '260',
            'frais_livraison' => '35',
            'place' => '4+1',
            'coffre' => 2,
            'porte' => 3,
            'radio' => 'MP3',
            'puissance' => '150 cv',
            'dispo' => false,
            'clim' => false,
            'gps' => false,
            'rehausseur' => false,
            'bebe' => false,
            'traction' => false,
            'decapotable' => false,
            'utilitaire' => false,
        ]);
    }

    // Ajoutez d'autres cas de test au besoin
}