document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item');
    const pages = document.querySelectorAll('.page');

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            // Remove active class from all menu items
            menuItems.forEach(item => item.classList.remove('active'));
            // Add active class to clicked menu item
            this.classList.add('active');

            // Hide all pages
            pages.forEach(page => page.classList.remove('active'));

            // Show corresponding page
            const pageId = this.getAttribute('id').replace('menu-item-', 'page-');
            const pageToShow = document.getElementById(pageId);
            pageToShow.classList.add('active');
        });
    });
    // Sélectionner le bouton "Ajouter une voiture"
    const addCarBtn = document.getElementById('addCarBtn');
    
    // Sélectionner le modal
    const carModal = document.getElementById('carModal');

    // Sélectionner le bouton de fermeture du modal
    const closeBtn = document.querySelector('.close');

    // Ouvrir le modal lorsque vous cliquez sur le bouton "Ajouter une voiture"
    addCarBtn.addEventListener('click', function() {
        carModal.style.display = 'block';
    });

    // Fermer le modal lorsque vous cliquez sur le bouton de fermeture ou en dehors de la zone du modal
    closeBtn.addEventListener('click', function() {
        carModal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == carModal) {
            carModal.style.display = 'none';
        }
    });
});

document.getElementById('saveCarBtn').addEventListener('click', function () {
    // Récupérer les valeurs du formulaire
    const nom_voiture = document.getElementById('nom_voiture').value;
    const boite = document.getElementById('boite').value;
    const tarif = document.getElementById('tarif').value;
    const frais_livraison = document.getElementById('frais_livraison').value;
    const place = document.getElementById('place').value;
    const coffre = document.getElementById('coffre').value;
    const puissance = document.getElementById('puissance').value;
    const porte = document.getElementById('porte').value;
    const radio = document.getElementById('radio').value;
    const bebe = document.getElementById('bebe').value;
    const traction = document.getElementById('traction').value;
    const lieu_dispo = document.getElementById('lieu_dispo').value;
    const dispo = document.getElementById('dispo').value;
    const clim = document.getElementById('clim').value;
    const gps = document.getElementById('gps').value;
    const rehausseur = document.getElementById('rehausseur').value;
    const decapotable = document.getElementById('decapotable').value;
    const utilitaire = document.getElementById('utilitaire').value;
    const motorisation = document.getElementById('motorisation').value;
    const imageInput = document.getElementById('image');
    const imageFile = imageInput.files[0]; // Première image sélectionnée

    // Créer un objet FormData pour envoyer les données
    const formData = new FormData();
    formData.append('nom_voiture', nom_voiture);
    formData.append('boite', boite);
    formData.append('tarif', tarif);
    formData.append('frais_livraison', frais_livraison);
    formData.append('place', place);
    formData.append('coffre', coffre);
    formData.append('puissance', puissance);
    formData.append('porte', porte);
    formData.append('bebe', bebe);
    formData.append('traction', traction);
    formData.append('lieu_dispo', lieu_dispo);
    formData.append('dispo', dispo);
    formData.append('clim', clim);
    formData.append('gps', gps);
    formData.append('radio', radio);
    formData.append('rehausseur', rehausseur);
    formData.append('decapotable', decapotable);
    formData.append('utilitaire', utilitaire);
    formData.append('motorisation', motorisation);
    // Ajouter d'autres valeurs au formulaire ...

    // Ajouter l'image au formulaire s'il y en a une
    if (imageFile) {
        formData.append('image', imageFile);
    }

    // Envoyer les données du formulaire à la route API via AJAX
    fetch('/api/voiture/create', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('La requête a échoué.');
        }
        return response.json();
    })
    .then(data => {
        console.log('Voiture enregistrée :', data);
        // Mettre à jour la liste des voitures avec la nouvelle voiture
    })
    .catch(error => {
        console.error('Erreur lors de l\'enregistrement de la voiture :', error);
        if (error.response) {
            // Si la réponse contient des détails d'erreur de validation
            error.response.json().then(errors => {
                console.error('Erreurs de validation :', errors);
                // Affichez les erreurs de validation dans la console ou traitez-les d'une autre manière
            });
        } else {
            console.error('Erreur inattendue :', error);
        }
    });
});

/* Affichage des véhicules */
fetch('/api/admin/voitures')
.then(response => response.json())
.then(data => {
    if (!data || data.length === 0) {
        throw new Error('Aucune voiture n\'a été récupérée');
    }
    
    // Sélectionner l'élément HTML tbody où vous souhaitez afficher les voitures
    const carTableBody = document.getElementById('carTableBody');
    
    // Colonnes à afficher
    const columnsToShow = ['voiture_id', 'symbole', 'nom_voiture', 'boite', 'tarif', 'frais_livraison', 'dispo', 'lieu_dispo'];
    
    // Boucler à travers les voitures et les ajouter au tableau
    data.forEach(car => {
        // Créer un élément de ligne de tableau
        const tableRow = document.createElement('tr');
        
        // Ajouter les cellules de données pour chaque colonne à afficher
        columnsToShow.forEach(column => {
            const tableCell = document.createElement('td');
            
            // Vérifier si la colonne est celle de l'image
            if (column === 'symbole') {
                // Créer une balise img pour afficher l'image
                const imgElement = document.createElement('img');
                imgElement.src = car[column]; // Supposant que la colonne 'image' contient l'URL de l'image
                imgElement.width = "150";
                imgElement.height = "100";
                
                // Ajouter la balise img à la cellule de tableau
                tableCell.appendChild(imgElement);
            } else {
                // Ajouter les données de la voiture à la cellule de tableau
                tableCell.textContent = car[column];
            }
            
            // Ajouter la cellule de tableau à la ligne du tableau
            tableRow.appendChild(tableCell);
        });

        // Créer une cellule de tableau pour les actions
        const actionCell = document.createElement('td');
        
        // Créer le bouton de modification
        const editButton = document.createElement('button');
        editButton.textContent = 'Modifier';
        editButton.addEventListener('click', () => {
            // Action à effectuer lors du clic sur le bouton Modifier
            const carId = car.voiture_id; // Supposons que le bouton a un attribut data-car-id contenant l'ID du véhicule correspondant
            const carData = getDataForCar(carId); // Fonction à remplacer par la fonction qui récupère les données du véhicule via AJAX

            // Préremplir les champs du modal avec les données du véhicule
            document.getElementById('nom_voiture_modal').value = carData.nom_voiture;
            document.getElementById('boite_modal').value = carData.boite;
            // Préremplir d'autres champs selon les données du véhicule

            // Afficher le modal "carModal"
            document.getElementById('carModal').style.display = 'block';
            console.log('Modifier la voiture avec ID', car.voiture_id);
        });
        
        // Créer le bouton de suppression
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Effacer';
        deleteButton.addEventListener('click', () => {
            // Action à effectuer lors du clic sur le bouton Effacer
            console.log('Effacer la voiture avec ID', car.voiture_id);
        });
        
        // Ajouter les boutons à la cellule d'action
        actionCell.appendChild(editButton);
        actionCell.appendChild(deleteButton);

        // Ajouter la cellule d'action à la ligne du tableau
        tableRow.appendChild(actionCell);
        
        // Ajouter la ligne du tableau au corps du tableau
        carTableBody.appendChild(tableRow);
    });
})
.catch(error => {
    console.error('Erreur lors de la récupération des voitures :', error);
});


/* Modification des véhicules */
function handleEditButtonClick() {
    // Sélectionner tous les boutons "Modifier"
    const editButtons = document.querySelectorAll('.edit-button');

    // Ajouter un gestionnaire d'événements à chaque bouton "Modifier"
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Récupérer l'ID de la voiture à partir de l'attribut data de chaque bouton
            const carId = button.dataset.carId;

            // Effectuer une requête AJAX pour récupérer les données de la voiture à partir de son ID
            fetch(`/api/cars/${carId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors de la récupération des données de la voiture : ' + response.statusText);
                    }
                    return response.json();
                })
                .then(car => {
                    // Remplir le formulaire du modal avec les données de la voiture
                    document.getElementById('nom_voiture').value = car.nom_voiture;
                    // Autres champs à remplir...

                    // Afficher le modal
                    document.getElementById('carModal').style.display = 'block';
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
}

// Appeler la fonction pour initialiser les gestionnaires d'événements une fois que le DOM est prêt
document.addEventListener('DOMContentLoaded', handleEditButtonClick);

