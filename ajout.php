<?php
	//vérification des informations envoyées par la méthode POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//récupération des informations du formulaire
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$adresse = $_POST['adresse'];
		$photo = $_POST['photo'];
		//connexion à la base de données
		$connexion = mysqli_connect('localhost', 'utilisateur', 'motdepasse', 'ma_base_de_donnees');
		if (!$connexion) {
			die('Erreur de connexion à la base de données');
		}
		//insertion de la nouvelle randonnée dans la base de données
		$query = "INSERT INTO randonnees (nom_randonnee, description, adresse_depart, photo) VALUES ('$nom', '$description', '$adresse', '$photo')";
		$resultat = mysqli_query($connexion, $query);
		if ($resultat) {
			echo 'Randonnée ajoutée avec succès';
		} else {
			echo 'Erreur lors de l\'ajout de la randonnée';
		}
		mysqli_close($connexion);
	} else {
		echo 'Erreur : les informations doivent être envoyées par la méthode POST';
	}
?>