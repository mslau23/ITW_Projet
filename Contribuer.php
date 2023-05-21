<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Contribuer</title>
    <link rel="stylesheet" href="Communs.css" type="text/css" />
    <?php
      // Vérifier si l'utilisateur est connecté
      session_start();
      if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
      // Rediriger vers la page de connexion
        header('Location: Connexion.php');
        exit();
      }
?>
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
            $iduser = $_SESSION['iduser'];
            if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
                echo $iduser;
            }
            else{
                echo '<li><a href="Connexion.php">Connexion</a></li>';
            }
            ?>
      </ul>
    </nav>

    <!-- le contenu de la page -->
    <main>
      <section><h1>Bienvenue sur la page de contribution !</h1></section>
      <section>
        <!-- formulaire de contribution à la base de donnees des randonnées-->
        <form name="formulaire" method="post" action="formulaire.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nom de la randonnée :</td>
                    <td><input name="nomRando" type="text" id="nomRando" /></td>
                </tr>
                <div class="icones"> 
                <tr>
                
                    <td><div style="display:flex"><img src= stylo.png , alt="temps", width="25" height="25"/> <div class="A">Description :</div></div></td>
                    <td><input name="description" type="text" id="description" /></td>
                </tr>
                <tr>
                    <td><div style="display:flex"><img src=puce.png , alt="temps", width="25" height="25"/><div class="A">Adresse du  point de départ :</div></div></td>
                    <td><input name="adresse" type="text" id="adresse"/></td>
                </tr>
                <tr>
                      <td><div style="display:flex"><img src=photo.png , alt="temps", width="25" height="25"/><div class="A">Photo :</div></div></td>
                      <td><input name="fileImg" type="file" id="fileImg"></td>
                      
                    

                </tr>
            </div>
                <tr>
                    <td>
                        <input type="submit" name="Submit" value="Envoyer" />
                        </div>
                    </td> 
                </tr>
                </form>
            </table>
      </section>

      
    </main>
  </body>
</html>