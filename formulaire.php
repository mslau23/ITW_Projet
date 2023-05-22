<!DOCTYPE html>
<html lang="fr">
   <body>

    <!-- le contenu de la page -->
     <?php
    //traitement de l'image
  
    $dir='C:\xampp\htdocs\images';
    $nameFile = $_FILES['fileImg']['name'];
    $tmpFile = $_FILES['fileImg']['tmp_name'];
    $typeFile = explode(".",$nameFile)[1];

    $correct=array("png",'jpg',"gif");
    


    if(in_array($typeFile, $correct)){
      move_uploaded_file($tmpFile,$dir ."/". $nameFile);
    }

    else{
        echo "le type de fichier est incorrect";
    }
    //fin du traitement de l'image
      $nomR = $_POST["nomRando"];
      $desc = $_POST["description"];
      $adresse = $_POST["adresse"];
      $photo=$nameFile;

      $sql = "INSERT INTO `rando`(`nom`,`description`,`adresse`,`photo`) VALUES (\"".$nomR."\",\"".$desc."\",\"".$adresse."\",\"".$photo."\")";

      $user = 'root';
      $pass = '';
     
      //Création d'une nouvelle ligne dans la base de donnée selon les informations rentrées par l'utilisateur
      try{
        $bd=new PDO('mysql:host=localhost;dbname=randobdd',$user,$pass);
        $bd->query($sql);
        $a = $bd->query('SELECT nom,description,adresse,photo FROM rando ORDER BY nom');
 
 /*while(($donnees = $a->fetch(PDO::FETCH_ASSOC)) !== false){
    echo $donnees['nom'].' '.$donnees['description'].' '.$donnees['adresse'].' '.$donnees['photo'].'<br>';

  }*/
      }
      catch(PDOException $e){
        print"Erreur :" . $e->getMessage() . "<br/>";
        die;
      }



//Création de la page HTML de la contribution
$nom = $_POST["nomRando"];
$desc2 = $_POST["description"];
$adresse2 = $_POST["adresse"];
$pageHtml = ' 
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Exemple1</title>
<link rel="stylesheet" href="Communs.css" type="text/css" />
</head>
<body>
<!-- le menu de navigation -->
<nav>
  <ul class="barre-de-menu">
    <li><a href="Contribuer.php">Contribuer</a></li>
    <li><a href="Randonner.php">Randonner</a></li>
  </ul>
</nav>
<section><h1>'.$nom.'</h1></section>
<section>
<img src="images/'.$nameFile.'" , alt="photo '.$nom.'", width="400" height="250"/></h1></section>
<div class= "icones">
  <p>'.$desc2.'</p>

  <div style="display:flex">
      <img src=puce.png , alt="localisation", width="30" height="30"/>
      <li>Départ: '.$adresse2.'</li>   
  </div>

      <!--score de popularité avec un bouton jaime-->
  <div class="popularity">
              <span>Popularité :</span>
              <span class="score">

              <?php 
              // Connexion à la base de données
              $connexion = mysqli_connect(\'localhost\', \'utilisateur\', \'motdepasse\', \'ma_base_de_donnees\');
              if (!$connexion) {
                die(\'Erreur de connexion à la base de données\');
              }
        
        // Requête pour calculer la moyenne des scores
        $query = "SELECT AVG(score) AS moyenne FROM score WHERE id_randonnee = $id_randonnee AND score IS NOT NULL";
        $resultat = mysqli_query($connexion, $query);
        
        if ($resultat && mysqli_num_rows($resultat) > 0) {
            $row = mysqli_fetch_assoc($resultat);
            $moyenne = $row[\'moyenne\'];
            echo $moyenne;
        } else {
            echo "0";
        }
        ?>
        </span>
              
        <form action="action_score.php" method="POST">
        <button type="submit" name="score" value="1">1</button>
        <button type="submit" name="score" value="2">2</button>
        <button type="submit" name="score" value="3">3</button>
        <button type="submit" name="score" value="4">4</button>
        <button type="submit" name="score" value="5">5</button>
    </form>
    </div>
</section>
</body>
</html>';

$newFile = $nom;
$open = fopen($newFile.'.php','w');
fwrite($open,$pageHtml);
fclose($open);

//redirection sur la page nouvellement créée, attention ne pas faire d'echo ou de html avant
header("location:".$newFile.".php");
      ?>

  </body>
</html>