<!DOCTYPE html>
<html lang="fr">
<?php
    session_start();
    if (isset($_POST['score'])) {
        $score = $_POST['score'];
        $iduser = $_SESSION['iduser'];
    
    // Connexion à la base de données
        $user = 'root';
        $pass = '';
        $dbh = new PDO('mysql:host=localhost;dbname=randoBDD', $user, $pass);
    
    // Mise à jour de la colonne score pour l'utilisateur spécifié
        $requete = $dbh->prepare('UPDATE score SET score = :score WHERE id = :id_user AND rando = :rando');
        $requete->bindParam(':score', $score);
        $requete->bindParam(':id_user', $id_user);
        $requete->bindParam(':rando', $rando);
        $requete->execute();
    
    // Redirection vers la page souhaitée après la mise à jour du score
    header("Location: ".$rando.".php");
    exit();
    }
    ?>
</html>