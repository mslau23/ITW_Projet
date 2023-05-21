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
          <span class="score">0</span>
          <button onclick="incrementPopularity(1)">1</button>
          <button onclick="incrementPopularity(2)">2</button>
          <button onclick="incrementPopularity(3)">3</button>
          <button onclick="incrementPopularity(4)">4</button>
          <button onclick="incrementPopularity(5)">5</button>
          <script>
              function incrementPopularity(value) {
                  const scoreElement = document.querySelector('.popularity .score');
                  let score = parseInt(scoreElement.textContent);
                  if (score >= 5) {
                      alert('Vous avez déjà donné la note maximale');
                      return;
                  }
                  score = value;
                  scoreElement.textContent = score.toString();
              }
          </script>
      </div>
</body>
</html>