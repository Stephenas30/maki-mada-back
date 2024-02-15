<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateLocationRequest;
use App\Models\Voiture;
use App\Models\Location;
use App\Models\Client;

class LocationVoitureController extends Controller
{
    public function index()
    {
        $cars = Voiture::all();
        return view('cars.index', compact('cars'));
    }

    public function creationRental(CreateLocationRequest $request)
    {
        //dd($request->all());
        // Validez les données de la requête si nécessaire

        $rental = new Location();
        $rental->voiture_id = $request->input('voiture_id');
        $rental->client_id = $request->input('client_id');
        $rental->date_depart = $request->input('date_depart');
        $rental->date_retour = $request->input('date_retour');
        $rental->lieu_depart = $request->input('lieu_depart');
        $rental->lieu_depart_detaille = $request->input('lieu_depart_detaille');
        $rental->lieu_retour = $request->input('lieu_retour');
        $rental->lieu_retour_detaille = $request->input('lieu_retour_detaille');
        $rental->hotel = $request->input('hotel');
        $rental->souhait = $request->input('souhait');
        $rental->assurance = $request->input('assurance');
        $rental->payement = $request->input('payement');

        $rental->save();

        return response()->json(['message' => 'Location de voiture créée avec succès'], 200);
        //return redirect()->route('cars.index');
    }

    public function showRental($id)
    {
        $rental = Location::findOrFail($id);
        return view('rentals.show', compact('rental'));
    }
}
