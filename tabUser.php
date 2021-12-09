<?php

     require_once 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau de bord</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>






       <center><p><h2>Liste des formations </h2></p></center>
<?php


if(!empty($_POST['search'])) {
    $search=$_POST['search'];

    $reqselect=" SELECT * FROM formation WHERE Sujet LIKE '%".$search."%'";
}else{
    $reqselect=" SELECT * from formation ";
}

  
  $resultat= $con->query($reqselect);
 /* $nbr=count( (array) $resultat);
  echo" <p> total".$nbr."voiture ...</p>";*/

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">formation  Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        </div>
        </div>
    </div>
    </div>

<div  class="container">


<div class="row">
            <div class="col-lg-12">
                <?php
                    if (isset($_SESSION['errors'])) {
                        echo '<div class="alert alert-danger" role="alert">';
                            echo $_SESSION['errors'];
                        echo '</div>';
                        unset($_SESSION['errors']) ;
                    }
                ?>
            </div>
        </div>



       

         

   <div style="padding-right:100px">     
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="acceuilUser.php"><button type="button" class="btn btn-outline-primary">Formations</button></a>
    <a class="navbar-brand" href="tabUserCours.php"><button type="button" class="btn btn-outline-secondary">Cours</button></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="" method="post"  >
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>   
<table class="table" >
<thead>
    <tr style="background-color:#c2bac2;">
    <th th scope="col"> Id</th>
       <th > Sujet</th>
       <th >Formateur </th>
       <th > Date de formation</th>
       <th >Temps de formation </th>
       <th >Afficher </th>
      

       </tr>
  </thead>
     </div>
  <tbody>
   
 <?php
  while ( $ligne = $resultat->fetch(PDO::FETCH_ASSOC))
  {
    echo '<tr class="tb">';
    echo '<td><a href="" data-toggle="modal" data-target="#exampleModal">'.$ligne['id']."</td>";
    echo "<td>".$ligne['Sujet']."</td>";
    echo "<td>".$ligne['Formateur']."</td>";
    echo "<td>".$ligne['Date_formation']."</td>";
    echo "<td>".$ligne['Temps_formation']."</td>";



//    echo '<td> <img src="images/'.$ligne['PHOTO']. ' " class="photocar"></td>';
     echo '<td> <a   href="afficheforma.php?id=' . $ligne['id'] . '"><i class="fas fa-eye"></i></a></td>';
    echo "</tr>";
}
 ?>
 
 


</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main1.js"></script>

</body>
</html>