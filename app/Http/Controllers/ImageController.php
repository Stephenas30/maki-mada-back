<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Voiture; // Assurez-vous d'importer le modèle Car

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validez les données du formulaire, y compris les fichiers téléchargés
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validation des images (2MB max)
            'voiture_id' => 'required|exists:voitures,id', // Assurez-vous que l'ID de la voiture existe
            // Autres validations pour les autres champs de la voiture
        ]);

        // Enregistrez les images dans la base de données
        foreach ($request->file('images') as $image) {
            // Enregistrez l'image dans le dossier de stockage (storage/app/public)
            $imagePath = $image->store('public/images');

            // Obtenez le chemin de stockage public de l'image
            $publicImagePath = str_replace('public/', 'storage/', $imagePath);

            // Créez une nouvelle instance de l'image associée à la voiture
            $car = Voiture::findOrFail($request->voiture_id);
            $car->images()->create(['path' => $publicImagePath]);
        }

        // Redirigez l'utilisateur ou retournez une réponse appropriée
        return response()->json(['message' => 'Images uploaded successfully'], 200);
    }

    public function uploadOne(Request $request, $carId)
    {
        // Valider les données du formulaire, y compris les fichiers téléchargés
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation des images (2MB max)
        ]);

        // Recherche la voiture associée
        $car = Voiture::findOrFail($carId);

        // Enregistre l'image dans le dossier de stockage (storage/app/public)
        $imagePath = $request->file('image')->store('public/images');

        // Créer et enregistrer une nouvelle image associée à la voiture
        $image = new Image(['path' => $imagePath]);
        $car->images()->save($image);

        // Retourne une réponse réussie avec le chemin de l'image
        return response()->json(['image_path' => asset(str_replace('public/', 'storage/', $imagePath))], 201);
    }

    public function delete($voiture_id, $img_id)
    {
        // Recherche la voiture associée
        $car = Voiture::findOrFail($voiture_id);

        // Recherche et supprime l'image associée
        $image = $car->images()->findOrFail($img_id);
        $image->delete();

        // Supprimer également le fichier physique de l'image
        \Storage::delete($image->path);

        // Retourne une réponse réussie
        return response()->json(['message' => 'Image supprimée avec succès.'], 200);
    }
}
