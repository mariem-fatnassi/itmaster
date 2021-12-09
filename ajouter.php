<?php
	require_once 'connexion.php';

  //Si l'utilisateur n'est pas connecté on le redirige vers la page de connexion
  //Il suffit de tester si la variable session $_SESSION['user_session'] existe ou non
  session_start();
  if(!isset($_SESSION['user_session'])) { 
    // s'il n'existe pas dans la variable session 
    // on le redérige vers la page de connexion
    header('Location:login.php');
  }

  // Ici ça veut dire que l'utilisateur est connecté
	//On récupère les données de l'utilisateur à partir de son id (depuis la session)
	$user_id = $_SESSION['user_session'];
	$sql = "SELECT * FROM users WHERE id=$user_id";
  $reponse = $con->query($sql);

  $ligne = $reponse->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'connexion.php' ?>
<?php include 'utilities.php' ?>
   


    <?php  
       if(!empty($_POST))
       {
           $suj=test_input($_POST['txtsuj']);
           $forma=test_input($_POST['txtforma']);
           $datt=test_input($_POST['txtdatt']);
           $tempsf=test_input($_POST['txttemp']);
           move_uploaded_file($_FILES["file"]["tmp_name"], "upload/video/" . $_FILES["file"]["name"]); 
           $contenu = "upload/video/".$_FILES["file"]["name"]; 
           $sql = "INSERT INTO formation (Sujet,Formateur,Date_formation,Temps_formation,Contenu) VALUES('$suj','$forma','$datt','$tempsf','$contenu')";

           // Envoi et exécution de la requête
           $res = $con->exec($sql);
         if($res)
         {
              echo"insertion des donnes validés";
         }
          else{
          echo"echec d'insertion des donnés";
               }

         }

?>

      <form  style=" margin:50px ; margin-left : 300px ;" name="formadd" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="formulaire " enctype="multipart/form-data">
      <h3 >Ajouter Nouvelle formation...</h3>
      <label>Sujet:</label><br>
      <input type="text" name="txtsuj" class="zonetext" placeholder="entrer le sujet" required>
     <br>
      <label>Formateur:</label>
      <br>
      <input type="text" name="txtforma" class="zonetext" placeholder="entrer le nom du formateur" required>
  <br>
      <label>Date de formation :</label>
      <br>
      <input type="text" name="txtdatt" class="zonetext" placeholder="enter la date de formation" required>
<br>
      <label>Temps de formation:</label>
      <br>
      <input type="text" name="txttemp" class="zonetext" placeholder="entrer le temps de formation" required>
      <br>
      <label>Contenu de la formation:</label>
      <br>
      <input type="file" name="file" class="zonetext" accept="video/*" required>
      
      <center><input type="submit" name="btadd" value="ajouter" style="background-color: #361336; color: white;  border-radius: 8px; border:none; cursor: pointer; margin: 8px; width: 100px; height : 40px">
     <p> <a href="acceuil.php" class="submit">Tableau de Bord </a></p></center>

    </form>



   

</body>
</html>