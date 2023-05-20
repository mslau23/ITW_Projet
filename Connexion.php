<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Contribuer</title>
    <link rel="stylesheet" href="Communs.css" type="text/css" />
  </head>
  <body>
    <!-- le menu de navigation -->
    <nav>
      <ul class="barre-de-menu">
        <li><a href="Contribuer.php" class="actuel">Contribuer</a></li>
        <li><a href="Randonner.php">Randonner</a></li>
        <?php
            // Vérifier si l'utilisateur est connecté
            session_start();
            $sessionId = session_id();
            if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
                echo $sessionId;
            }
            else{
                echo '<li><a href="Connexion.php">Connexion</a></li>';
            }
            ?>
      </ul>
    </nav>
    <main>
    <section><h1>Connexion</h1></section>
    <section>
        <!-- formulaire de connexion -->
        <form name="connexion" method="post">
            <table>
                <tr>
                    <td>Identifiant</td>
                    <td><input name="iduser" type="text" id="iduser" /></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input name="mdpuser" type="text" id="mdpuser" /></td>
                </tr>
                </table>
          <input type="submit" value="Se connecter" />
        </form>
        <!-- bouton d'inscription -->
        <form action="Inscription.php">
          <input type="submit" value="S'inscrire" />
        </form>
      </section>
    </main>

    <?php
      // Traitement de la connexion
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = 'root';
        $pass = '';
        try {
          $bdd = new PDO('mysql:host=localhost;dbname=utilisateurs', $user, $pass);
          
          // Vérifier les identifiants de connexion
          $identifiant = $_POST['iduser'];
          $motDePasse = $_POST['mdpuser'];
          $requete = $bdd->prepare('SELECT * FROM utilisateurs WHERE identifiant = :identifiant');
          $requete->bindParam(':identifiant', $identifiant);
          $requete->execute();
          $utilisateur = $requete->fetch();

          if ($utilisateur && password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
            // Connexion réussie
            // Initialiser la variable de session loggedIn
            session_start();
            $_SESSION['loggedIn'] = true;
            echo 'Connexion réussie !';
          } else {
            // Identifiant ou mot de passe incorrect
            echo 'Identifiant ou mot de passe incorrect.';
          }
        } catch (PDOException $e) {
          print "Erreur :" . $e->getMessage() . "<br/>";
          die;
        }
      }
    ?>
  </body>
</html>