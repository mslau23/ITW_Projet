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
              <span class="score"></span>
              
     <form action="'.$nom.'.php">
              <button type="submit" <?php if (isset($_GET[\'choix\'])!=null && $_GET[\'choix\']=="1") { echo "style=color:green";} ?>  name="choix" value="1" onclick="insert()">1</button>
              <button type="submit" <?php if (isset($_GET[\'choix\'])!=null && $_GET[\'choix\']=="2") { echo "style=color:green";} ?> name="choix" value="2" onclick="insert()">2</button>
              <button type="submit" <?php if (isset($_GET[\'choix\'])!=null && $_GET[\'choix\']=="3") { echo "style=color:green";} ?> name="choix" value="3" onclick="insert()">3</button>
              <button type="submit" <?php if (isset($_GET[\'choix\'])!=null && $_GET[\'choix\']=="4") { echo "style=color:green";} ?> name="choix" value="4" onclick="insert()">4</button>
              <button type="submit" <?php if (isset($_GET[\'choix\'])!=null && $_GET[\'choix\']=="5") { echo "style=color:green";} ?> name="choix" value="5" onclick="insert()">5</button>
     </form>

     <?php
        if (isset($_GET[\'choix\'])) {
           //connection à la bdd pour enregistrer le score
          $user = \'root\';
          $pass = \'\';
 
          //Création d une nouvelle ligne dans la base de donnée selon les informations rentrées par l utilisateur
          $bd=new PDO(\'mysql:host=localhost;dbname=randobdd\',$user,$pass);
          $note=$_GET[\'choix\'];
          

          $scoreSQL = \'UPDATE rando SET score = \'.$note.\' WHERE nom= "'.$nom.'"\';
          $bd->query($scoreSQL);
        }
     ?>
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