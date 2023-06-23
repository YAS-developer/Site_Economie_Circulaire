<?php
// connexion a la base de donnees et creation de la session
session_start();
try{
    $db = mysqli_connect("dwarves.iut-fbleau.fr","hamrouni","Yutyut54321.","hamrouni");
}catch(Exception $e){
    die($e);
}

?>