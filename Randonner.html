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
        <li><a href="Contribuer.html">Contribuer</a></li>
        <li><a href="Randonner.html" class="actuel">Randonner</a></li>
      </ul>
    </nav>

    <!-- le contenu de la page -->
    <main>
      <section><p>Bienvenue sur la page de Randonnee !</p></section>
      <!-- traitement bdd -->
      <section>
      <?php
 //Connexion au serveur
 $dsn = "mysql:host=" . localhost . ";dbname=" . $rando;
 $user = root;
 $pass = root;
 $idcom = new PDO($dsn,$user,$pass);
 //Contrôle de la connexion
 if(!$idcom) {
 echo "Erreur";
 }
 //*************************************************
 //Requêtes SQL sur la base choisie
 $valnom=$_POST['nom'];
 $valdescription=$_POST['description'];
 $valadresse=$_POST['adresse'];
 $inserer = "INSERT INTO rando (nom, description, adresse) VALUES ( '$valnom','$valdescription','$valadresse');" ;
 $resultat=$idcom->query($inserer);
 $ordonner = "SELECT * FROM rando ORDER BY nom";
 $resultat=$idcom->query($ordonner);
 //Lecture des résultats
 echo "<ul>";
 while($ligne = $resultat->fetch(PDO::FETCH_NUM)){
    for($i=0; $i<count($ligne); $i++){
        echo "<li>$ligne[$i]</li>";
    }
 }
 echo "</ul>";
 //*************************************************
 //Fermeture de la connexion
 $resultat->closeCursor();
 $idcom = NULL;
?>              
      </section>
    </main>
  </body>
</html>