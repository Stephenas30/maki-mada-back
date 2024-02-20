<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class DispoVoitureController extends Controller
{
    public function index(Request $request)
    {
        $dispo = $request->input('dispo', 0); // Par défaut, si aucun paramètre 'dispo' n'est fourni, retourne 0

        // Récupère les voitures en fonction de la disponibilité
        $voitures = Voiture::where('dispo', $dispo)->get();

        return response()->json($voitures);
    }
    public function creationVoiture(Request $request)
    {
        //dd($request->all());
        // Validez les données de la requête si nécessaire

        $car = new Voiture();
        $car->nom_voiture = $request->input('nom_voiture');
        $car->boite = $request->input('boite');
        $car->tarif = $request->input('tarif');
        $car->frais_livraison = $request->input('frais_livraison');
        $car->place = $request->input('place');
        $car->coffre = $request->input('coffre');
        $car->puissance = $request->input('puissance');
        $car->porte = $request->input('porte');
        $car->radio = $request->input('radio');
        $car->dispo = $request->input('dispo');
        $car->clim = $request->input('clim');
        $car->gps = $request->input('gps');
        $car->rehausseur = $request->input('rehausseur');
        $car->bebe = $request->input('bebe');
        $car->traction = $request->input('traction');
        $car->decapotable = $request->input('decapotable');
        $car->utilitaire = $request->input('utilitaire');
        $car->lieu_dispo = $request->input('lieu_dispo');

        $car->save();

        return response()->json(['message' => 'Location de voiture créée avec succès'], 200);
        //return redirect()->route('cars.index');
    }

    public function showVoiture(Request $request)
    {
        $dispo = $request->input('dispo', 0); // Par défaut, si aucun paramètre 'dispo' n'est fourni, retourne 0
        $lieuDispo = $request->input('lieu_dispo');

        // Récupère les voitures en fonction de la disponibilité et du lieu de disponibilité
        $voitures = Voiture::where('dispo', $dispo)
                            ->where('lieu_dispo', $lieuDispo)
                            ->get();

        return response()->json($voitures);
    }
}
