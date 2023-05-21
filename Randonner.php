<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Randonnee</title>
    <link rel="stylesheet" href="Communs.css" type="text/css" />
  </head>
  <body>
    <!-- le menu de navigation -->
    <nav>
      <ul class="barre-de-menu">
        <li><a href="Contribuer.php">Contribuer</a></li>
        <li><a href="Randonner.php" class="actuel">Randonner</a></li>
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
    <main>
      <section><h1>Bienvenue sur la page de Randonnee !</h1></section>
      <section>
      <p>Trier par :</p>
        <ul class="tri-menu">
          <li><a href="Randonner.php?tri=nom">Nom</a></li>
          <li><a href="Randonner.php?tri=popularite">Popularité</a></li>
        </ul>
      </section>
      <!-- traitement bdd -->
      <?php
      //Connexion au serveur
      $user = 'root';
      $pass = '';
      //$donnees = '';
      try{
        $bd=new PDO('mysql:host=localhost;dbname=randoBDD',$user,$pass);
        $tri = isset($_GET['tri']) ? $_GET['tri'] : 'nom'; // Récupération du paramètre de tri
        $requete = 'SELECT nom, adresse FROM rando';
          if ($tri == 'nom') {
            $requete .= ' ORDER BY nom'; // Tri par nom
          } elseif ($tri == 'popularite') {
            $requete .= ' ORDER BY score DESC'; // Tri par popularité
          }
          $resultat = $bd->query($requete);
          // Affichage de chaque ligne
          while(($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) !== false){
            echo '<a href="'.$donnees['nom'].'.php">'.$donnees['nom'].'</a><br><li><img src=puce.png , alt="localisation", width="15" height="15"/> Départ : '.$donnees['adresse'].'</li><br><br>';

          }
        }
        catch(PDOException $e){
          print"Erreur :" . $e->getMessage() . "<br/>";
          die;
        }
        ?>              
      </section>
    </main>
  </body>
</html>