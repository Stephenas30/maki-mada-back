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

    public function tout(Request $request)
    {
        $voitures = Voiture::all();

        return response()->json($voitures);
    }

    public function creationVoiture(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validation des images (2MB max)
        ]);

        // Enregistre l'image dans le dossier de stockage (storage/app/public)
        $imagePath = $request->file('image')->store('public');

        // Obtient le chemin de stockage public de l'image
        $publicImagePath = str_replace('public/', 'storage/', $imagePath);

        //dd($request->all());
        // Changement des données 
        $dispo = $request->input('dispo');
        $clim = $request->input('clim');
        $gps = $request->input('gps');
        $rehausseur = $request->input('rehausseur');
        $decapotable = $request->input('decapotable');
        $utilitaire = $request->input('utilitaire');
        $voiture_id = $request->input('voiture_id');

        if ($dispo === "ON") {
            $dispo = 1;
        } else {
            $dispo = 0;
        }
        if ($clim === "ON") {
            $clim = 1;
        } else {
            $clim = 0;
        }
        if ($gps === "ON") {
            $gps = 1;
        } else {
            $gps = 0;
        }
        if ($rehausseur === "ON") {
            $rehausseur = 1;
        } else {
            $rehausseur = 0;
        }
        if ($decapotable === "ON") {
            $decapotable = 1;
        } else {
            $decapotable = 0;
        }
        if ($utilitaire === "ON") {
            $utilitaire = 1;
        } else {
            $utilitaire = 0;
        }
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
        $car->dispo = $dispo;
        $car->clim = $clim;
        $car->gps = $gps;
        $car->rehausseur = $rehausseur;
        $car->bebe = $request->input('bebe');
        $car->traction = $request->input('traction');
        $car->decapotable = $decapotable;
        $car->utilitaire = $utilitaire;
        $car->lieu_dispo = $request->input('lieu_dispo');
        $car->motorisation = $request->input('motorisation');
        $car->symbole = $publicImagePath;

        $car->save();

        //return response()->json(['message' => 'Location de voiture créée avec succès'], 200);
        //return redirect()->route('voiture.create');
        return redirect()->route('cars.index')->with('success', 'Voiture ajoutée avec succès.');
    }

    public function majVoiture(Request $request, $voiture_id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validation des images (2MB max)
        ]);

        // Trouver la voiture à mettre à jour
        $car = Voiture::findOrFail($id);

        // Enregistre l'image dans le dossier de stockage (storage/app/public)
        $imagePath = $request->file('image')->store('public');

        // Obtient le chemin de stockage public de l'image
        $publicImagePath = str_replace('public/', 'storage/', $imagePath);

        //dd($request->all());
        // Changement des données 
        $dispo = $request->input('dispo');
        $clim = $request->input('clim');
        $gps = $request->input('gps');
        $rehausseur = $request->input('rehausseur');
        $decapotable = $request->input('decapotable');
        $utilitaire = $request->input('utilitaire');
        $voiture_id = $request->input('voiture_id');

        if ($dispo === "ON") {
            $dispo = 1;
        } else {
            $dispo = 0;
        }
        if ($clim === "ON") {
            $clim = 1;
        } else {
            $clim = 0;
        }
        if ($gps === "ON") {
            $gps = 1;
        } else {
            $gps = 0;
        }
        if ($rehausseur === "ON") {
            $rehausseur = 1;
        } else {
            $rehausseur = 0;
        }
        if ($decapotable === "ON") {
            $decapotable = 1;
        } else {
            $decapotable = 0;
        }
        if ($utilitaire === "ON") {
            $utilitaire = 1;
        } else {
            $utilitaire = 0;
        }
        // Mise à jour

        $car->nom_voiture = $request->input('nom_voiture');
        $car->boite = $request->input('boite');
        $car->tarif = $request->input('tarif');
        $car->frais_livraison = $request->input('frais_livraison');
        $car->place = $request->input('place');
        $car->coffre = $request->input('coffre');
        $car->puissance = $request->input('puissance');
        $car->porte = $request->input('porte');
        $car->radio = $request->input('radio');
        $car->dispo = $dispo;
        $car->clim = $clim;
        $car->gps = $gps;
        $car->rehausseur = $rehausseur;
        $car->bebe = $request->input('bebe');
        $car->traction = $request->input('traction');
        $car->decapotable = $decapotable;
        $car->utilitaire = $utilitaire;
        $car->lieu_dispo = $request->input('lieu_dispo');
        $car->motorisation = $request->input('motorisation');
        $car->symbole = $publicImagePath;

        $car->save();

        //return response()->json(['message' => 'Location de voiture créée avec succès'], 200);
        //return redirect()->route('voiture.create');
        return redirect()->route('cars.index')->with('success', 'Voiture mise à jour avec succès.');
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

    public function destroyVoiture($voiture_id)
    {
        // Trouver la voiture à supprimer
        $car = Car::findOrFail($voiture_id);

        // Supprimer la voiture de la base de données
        $car->delete();

        // Retourner une réponse JSON pour indiquer que la suppression a été effectuée avec succès
        return response()->json(['message' => 'Voiture supprimée avec succès']);
    }
}
