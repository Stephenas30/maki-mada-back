<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <ul>
        <li id="menu-item-dashboard" class="menu-item active">Dashboard</li>
        <li id="menu-item-voitures" class="menu-item">Voitures</li>
        <li id="menu-item-locations" class="menu-item">Locations</li>
    </ul>
</div>

<div class="content">
    <div id="page-dashboard" class="page active">Dashboard Content</div>
    <div id="page-voitures" class="page">
        <div class="container">
            <h1>Voitures</h1>
            <button class="btn" id="addCarBtn">Ajouter une voiture</button>
        
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom du voiture</th>
                        <th>Boite de vitesse</th>
                        <th>Tarif</th>
                        <th>Frais de livraison</th>
                        <th>Disponibilité</th>
                        <th>Lieu de disponibilité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="carTableBody">
                    <!-- Les lignes des voitures seront ajoutées ici dynamiquement -->
                    <tr></tr>
                </tbody>
            </table>
        </div>
        
        <!-- Modal d'ajout/édition de voiture -->
        <div class="modal" id="carModal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Ajouter une voiture</h2>
                <form id="carForm">
                    <input type="hidden" id="carId">
                    <div>
                        <label for="nom_voiture">Marque et modèle</label>
                        <input type="text" id="nom_voiture" required>
                    </div>
                    <div>
                        <label for="boite">Boite de vitesse</label>
                        <select name="boite" id="boite">
                            <option value="Manuelle">Manuelle</option>
                            <option value="Automatique">Automatique</option>
                        </select>
                    </div>
                    <div>
                        <label for="tarif">Tarif</label>
                        <input type="number" id="tarif" required>
                    </div>
                    <div>
                        <label for="frais_livraison">Frais de livraison</label>
                        <input type="number" id="frais_livraison" required>
                    </div>
                    <div>
                        <label for="place">Place</label>
                        <input type="number" id="place" required>
                    </div>
                    <div>
                        <label for="coffre">Coffre</label>
                        <input type="number" id="coffre" required>
                    </div>
                    <div>
                        <label for="puissance">Puissance du moteur</label>
                        <input type="number" id="puissance" required>
                    </div>
                    <div>
                        <label for="porte">Portes</label>
                        <input type="number" id="porte" required>
                    </div>
                    <div>
                        <label for="radio">Radio</label>
                        <input type="text" id="radio" required>
                    </div>
                    <div>
                        <label for="motorisation">Motorisation</label>
                        <select name="motorisation" id="motorisation">
                            <option value="Essence">Essence</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electrique">Electrique</option>
                            <option value="Hybride">Hybride</option>
                        </select>
                    </div>
                    <div>
                        <label for="bebe">Siège bébé</label>
                        <input type="number" id="bebe" required>
                    </div>
                    <div>
                        <label for="traction">Traction</label>
                        <select name="traction" id="traction">
                            <option value=0>2 roues motrices</option>
                            <option value=1>4 roues motrices</option>
                        </select>
                    </div>
                    <div>
                        <label for="lieu_dispo">Lieu de disponibilité</label>
                        <input type="text" id="lieu_dispo" required>
                    </div>
                    <div class="float">
                        <label for="dispo">Disponibilité</label>
                        <input type="checkbox" id="dispo">
                    </div>
                    <div class="float">
                        <label for="clim">Climatisation</label>
                        <input type="checkbox" id="clim">
                    </div>
                    <div class="float">
                        <label for="gps">GPS</label>
                        <input type="checkbox" id="gps">
                    </div>
                    <div class="float">
                        <label for="rehausseur">Rehausseur</label>
                        <input type="checkbox" id="rehausseur">
                    </div>
                    <div class="float">
                        <label for="decapotable">Decapotable</label>
                        <input type="checkbox" id="decapotable">
                    </div>
                    <div class="float">
                        <label for="utilitaire">Utilitaire</label>
                        <input type="checkbox" id="utilitaire">
                    </div>
                    <div>
                        <label for="image">Image représentative</label>
                        <input type="file" id="image">
                    </div>
                </form>
                <button class="btn" id="saveCarBtn">Enregistrer</button>
            </div>
        </div>
    </div>
    <div id="page-locations" class="page">Settings Content</div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
