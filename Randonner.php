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
      </ul>
    </nav>

    <!-- le contenu de la page -->
    <main>
      <section><h1>Bienvenue sur la page de Randonnee !</h1></section>
      <!-- traitement bdd -->
      <?php
 //Connexion au serveur
$user = 'root';
$pass = '';
//$donnees = '';
try{
  $bd=new PDO('mysql:host=localhost;dbname=randoBDD',$user,$pass);
  $a = $bd->query('SELECT nom, adresse FROM rando ORDER BY nom');
// Affichage de chaque ligne
  while(($donnees = $a->fetch(PDO::FETCH_ASSOC)) !== false){
    echo '<a href="'.$donnees['nom'].'.html">'.$donnees['nom'].'</a><br><li><img src=puce.png , alt="localisation", width="15" height="15"/> Départ : '.$donnees['adresse'].'</li><br><br>';

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