<!DOCTYPE html>
<html lang="fr">
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
</html>