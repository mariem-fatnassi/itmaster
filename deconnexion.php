<?php
require('config.php');
    // include "connexion.php";
session_start();
session_unset();
session_destroy();

header('location:index.php');




    ?>
