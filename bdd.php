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
 //Lecture des résultats
 //*************************************************
 //Fermeture de la connexion
 $idcom = NULL;
?>
</html>