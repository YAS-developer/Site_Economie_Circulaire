
<?php
// a chaque deconnexion, on vide le tableau SESSION et on detruit la session et on revient dans l'index non connecter
session_start();
session_unset();
session_destroy();
header("Location: ../../../../index.php");
?>