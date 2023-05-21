<!DOCTYPE html>
<html lang="fr">
<?php
    if (isset($_POST['score'])) {
        $score = $_POST['score'];
        session_start();
        $iduser = $_SESSION['iduser'];
    
    // Connexion à la base de données
        $user = 'root';
        $pass = '';
        $dbh = new PDO('mysql:host=localhost;dbname=rando', $user, $pass);
    
    // Mise à jour de la colonne score pour l'utilisateur spécifié
        $requete = $dbh->prepare('UPDATE score SET score = :score WHERE id_user = :id_user AND rando = :rando');
        $requete->bindParam(':score', $score);
        $requete->bindParam(':id_user', $id_user);
        $requete->bindParam(':rando', $randonnee);
        $requete->execute();
    }
    ?>
</html>