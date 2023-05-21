<!DOCTYPE html>
<html>
<head>
	<title><?php echo $randonnee['nom_randonnee']; ?></title>
	<link rel="stylesheet" href="Commun.css">
</head>
<body>
	 <!-- le menu de navigation -->
     <nav>
      <ul class="barre-de-menu">
        <li><a href="Contribuer.php" class="actuel">Contribuer</a></li>
        <li><a href="Randonner.php">Randonner</a></li>
        <?php
            // Vérifier si l'utilisateur est connecté
            if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
                session_start();
                $iduser = $_SESSION['iduser'];
                echo "<li>' $iduser '</li>";
            }
            else{
                echo '<li><a href="Connexion.php">Connexion</a></li>';
            }
            ?>
      </ul>
    </nav>

    <!-- le contenu de la page -->
    <h1><?php echo $randonnee['nom_randonnee']; ?></h1>
	<p>Description : <?php echo $randonnee['description']; ?></p>
	<p>Adresse du point de départ : <?php echo $randonnee['adresse_depart']; ?></p>
	<img src="<?php echo $randonnee['photo']; ?>" alt="Photo de la randonnée">
	<?php
		//connexion à la base de données
		$connexion = mysqli_connect('localhost', 'utilisateur', 'motdepasse', 'ma_base_de_donnees');
		if (!$connexion) {
			die('Erreur de connexion à la base de données');
		}
		//récupération des informations de la randonnée depuis la base de données
		$id_randonnee = $_GET['id'];
		$query = "SELECT * FROM randonnees WHERE id_randonnee = $id_randonnee";
		$resultat = mysqli_query($connexion, $query);
		if (mysqli_num_rows($resultat) > 0) {
			$randonnee = mysqli_fetch_assoc($resultat);
		} else {
			echo 'Randonnée non trouvée';
		}
		mysqli_close($connexion);
	?>
    <div class="popularity">
          <span>Popularité :</span>
          <span class="score">
            <?php 
            // Requête pour calculer la moyenne des scores
            $query = $dbh->prepare('SELECT AVG(score) AS moyenne FROM score WHERE rando = :id_randonnee AND score IS NOT NULL');
            $requete->bindParam(':id_randonnee', $id_randonnee);
            $requete->execute();
            $resultat = $requete->fetch();
            $moyenne = $resultat['moyenne'];
            if ($resultat && $resultat['moyenne'] !== null){
                echo $moyenne;
            }
            else {
                echo "0";
            }
            ?>
            </span>
            <form action="action_score.php" method="POST">
                <button type="submit" name="score" value="1">1</button>
                <button type="submit" name="score" value="2">2</button>
                <button type="submit" name="score" value="3">3</button>
                <button type="submit" name="score" value="4">4</button>
                <button type="submit" name="score" value="5">5</button>
            </form>
      </div>
</body>
</html>