<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" href="Communs.css" type="text/css" />
  </head>
  <body>
    <!-- le menu de navigation -->
    <nav>
      <ul class="barre-de-menu">
        <li><a href="Contribuer.php">Contribuer</a></li>
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
    <main>
      <section>
        <h1>Inscription</h1>
      </section>
      <section>
        <!-- formulaire d'inscription -->
        <form name="inscription" method="post">
          <table>
            <tr>
              <td>Identifiant</td>
              <td><input name="iduser" type="text" id="iduser" /></td>
            </tr>
            <tr>
              <td>Mot de passe</td>
              <td><input name="mdpuser" type="password" id="mdpuser" /></td>
            </tr>
          </table>
          <input type="submit" value="S'inscrire" />
        </form>
      </section>
    </main>

    <?php
      // Traitement de l'inscription
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = 'root';
        $pass = '';
        try {
          $bdd = new PDO('mysql:host=localhost;dbname=randoBDD', $user, $pass);
          
          // Vérifier si l'identifiant existe déjà
          $identifiant = $_POST['iduser'];
          $requete = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = :identifiant');
          $requete->bindParam(':identifiant', $identifiant);
          $requete->execute();
          $utilisateur = $requete->fetch();

          if ($utilisateur) {
            // Identifiant déjà utilisé
            echo 'Cet identifiant est déjà utilisé. Veuillez en choisir un autre.';
          } else {
            // Insérer le nouvel utilisateur dans la base de données
            $motDePasse = $_POST['mdpuser'];
            $requete = $bdd->prepare('INSERT INTO utilisateurs (id, pass) VALUES (:identifiant, :mot_de_passe)');
            $requete->bindParam(':identifiant', $identifiant);
            $requete->bindParam(':mot_de_passe', $motDePasse);
            $requete->execute();

            // Rediriger vers la page de connexion
            header('Location: Connexion.php');
            exit();
          }
        } catch (PDOException $e) {
          print "Erreur :" . $e->getMessage() . "<br/>";
          die;
        }
      }
    ?>
  </body>
</html>
