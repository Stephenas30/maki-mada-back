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
        $car->nom_voiture = 'Subaru Impreza';
        $car->boite = 'Manuelle';
        $car->tarif = '550';
        $car->frais_livraison = '75';
        $car->place = '4';
        $car->coffre = 2;
        $car->puissance = '650 cv';
        $car->porte = 3;
        $car->radio = 'MP3';
        $car->dispo = true;
        $car->clim = false;
        $car->gps = false;
        $car->rehausseur = false;
        $car->bebe = false;
        $car->traction = false;
        $car->decapotable = false;
        $car->utilitaire = false;
        $car->lieu_dispo = "Antananarivo";
        $car->save();

        
        // Vérifier que la voiture a été créée avec succès
        $this->assertDatabaseHas('voitures', [
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
            'lieu_dispo' => 'Antananarivo',
        ]);
        
    }

    // Ajoutez d'autres cas de test au besoin
}