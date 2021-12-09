
<?php
    include "connexion.php";
  include "utilities.php";
    // Récupérer
    $id = $_GET['id'];
    
    // Récupérer les informations du client à modifier à partir du formulaire
    $name= test_input($_POST['name']);
    $mail = test_input($_POST['mail']);
    $role = test_input($_POST['role']);
 
    $nomf = $_FILES['myFile']['name'];
    $type = $_FILES['myFile']['type'];
    $size = $_FILES['myFile']['size'];
    $temp = $_FILES['myFile']['tmp_name'];

    $path = 'img/' . $nomf;

    $resultat = move_uploaded_file($temp, $path);

    // $nomf = $_FILES['myFile']['name'];
    // $type = $_FILES['myFile']['type'];
    // $size = $_FILES['myFile']['size'];
    // $temp = $_FILES['myFile']['tmp_name'];

    // $path = 'images/' . $nomf;

    // $resultat = move_uploaded_file($temp, $path);

    // Préparer la requête de modification
    $sql = "UPDATE users SET user_name = ?, email = ?,photo = ? , role=?  WHERE id = ?";
    $req=$con->prepare($sql);
    $req->execute([$name,$mail,$role,$nom,$id]);

    //  if (!$req) 
    // {
    //    session_start();
    //     $_SESSION['errors'] = "Suppression non effectuée";
    // }

    header('location:user.php');
?>
