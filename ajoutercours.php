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
           $imm=test_input($_POST['txtim']);
           $marque=test_input($_POST['txtmarq']);
           move_uploaded_file($_FILES["file"]["tmp_name"], "upload/file/" . $_FILES["file"]["name"]); 
           $contenu = $_FILES["file"]["name"]; 

           $sql = "INSERT INTO cours(Titre,Contenu) VALUES('$imm', '$contenu')";

             // Envoi et exécution de la requête
             $res = $con->exec($sql);
             if ($res)
             {
                 header('Location:tableaucoursAdmin.php');
             }
            else{
              echo "echec d'insertion des donnés"; 
            }

         }

?>

      <form  style=" margin:50px ; margin-left : 300px ;" name="formadd" action="" method="post" class="formulaire " enctype="multipart/form-data">
      <h3 >Ajouter un cours</h3>
     
      <label>Titre:</label>
      <br>
      <input type="text" name="txtmarq" class="zonetext" placeholder="entrer le titre du cours" required>
  <br>

  <label>Contenu:</label>
      <br><br>
      
      <input type="file" name="file" class="zonetext"   accept=".pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
  <br>
  
      <!-- <label>Date de formation :</label>
      <br>
      <input type="text" name="txtpr" class="zonetext" placeholder="enter la date de formation" required>
<br>
      <label>Temps de formation:</label>
      <br>
      <input type="text" name="txttemp" class="zonetext" placeholder="entrer le temps de formation" required>
       -->
      <center><input type="submit" name="btadd" value="ajouter" style="background-color: #361336; color: white;  border-radius: 8px; border:none; cursor: pointer; margin: 8px; width: 100px; height : 40px">
      
     </center>

    </form>



   

</body>
</html>