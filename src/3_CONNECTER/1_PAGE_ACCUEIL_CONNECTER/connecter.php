
<?php

require("../BD/db.php");



if(!isset($_SESSION['login'])){
    // htmlspecialchars evite les injections.
    $login = htmlspecialchars($_POST['login']) ;

    $req = "SELECT login FROM customer where login = '$login'";
    $res = mysqli_query($db, $req);
    // si la valeur renvoie false 
    if(!$res){echo "probleme de la commande";session_destroy();die;}
    // si la commande renvoie un nb de ligne = 0, donc aucune reponse de la requete
    if(mysqli_num_rows($res) == 0){echo 'pas de utilisateur';session_destroy();die;}

    $ligne = mysqli_fetch_assoc($res);
    $_SESSION['login'] = $login;    
}
   
    

$req2 = "SELECT surname, firstname,stash 
FROM customerprotecteddata
JOIN customer ON customer.id = customerprotecteddata.id
WHERE login = '".$_SESSION['login']."' ";

$res2 = mysqli_query($db, $req2);
if(!$res2){echo "probleme de la commande";session_destroy();die;}
if(mysqli_num_rows($res2) == 0){echo 'pas de utilisateur';session_destroy();die;}

$ligne2 = mysqli_fetch_assoc($res2);

//recuperer les informations du clients

$_SESSION['nom'] = empty($ligne2['surname'])? null : $ligne2['surname'];

$_SESSION['prenom']= empty($ligne2['firstname'])? null : $ligne2['firstname'];

$_SESSION['cagnotte']= empty($ligne2['stash'])? 0 : $ligne2['stash'];                               


$req3= "SELECT COUNT(customer) FROM customerextraction JOIN customer on customer.id = customerextraction.customer WHERE login='".$_SESSION['login']."'";
$exec3=mysqli_query($db,$req3);

if(!$exec3){echo "probleme de la commande";session_destroy();die;}

$total_extraction_client= mysqli_fetch_assoc($exec3);

$total_extraction_client['COUNT(customer)'];

$req4="SELECT M.name ,CE.quantity FROM mendeleiev M JOIN customerextraction CE on M.Z=CE.element JOIN customer  C  on C.id = CE.customer WHERE login='".$_SESSION['login']."'";
$exec4=mysqli_query($db,$req4);

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./connecter.css">
        <link rel="stylesheet" href="../CSS/all.css">
        <link rel="stylesheet" href="../CSS/nav.css">
        <link rel="icon" href="../../5_IMAGE/logo/YADE_logo.ico"/>
        <title>Yade - Pour un monde qui change</title>
        </head>
    <body>

        <nav>
            <form class="gauche"  action="./index_connecter"><input  type="image" alt="YADE_logo" width="170px" src="../../5_IMAGE/logo/YADE_logo.png"></form>

            <ul>
                <li class="pos achat" ><form action="../2_PAGE_ACHAT_CONNECTER/achat_connecter.php" ><input style="font-family :Arial, sans-serif;" class="bn632-hover bn26" type="submit" value="ACHAT"></form></li>
                <li class="pos vente" ><form action="../3_PAGE_VENTE_CONNECTER/vente_connecter.php" ><input style="font-family :Arial, sans-serif;" class="bn632-hover bn26" type="submit" value="VENTE"></form></li>
                <li class="pos"><pre><p style="font-family :Arial, sans-serif;" class="cssanimation sequence elevateRight">Bonjour   <?=$_SESSION['prenom'].'  '.$_SESSION['nom']?></p></pre></li>
                <li class="pos"><form action="../4_PAGE_RECHARGER_CAGNOTTE/recharger_cagnotte.php" method="post"><input style="font-family :Arial, sans-serif;" class="bn632-hover bn22" type="submit" value ="Cagnotte:<?=$_SESSION['cagnotte']?> €"></form> 
                                                                                                                                                                                                                                                             
                </li>
                <li class="pos"><form class="droit" action="../5_DECONNEXION/disconnect.php" method="post"><input type="image"  width="45px"alt="bouton_deconnexion" src="../../5_IMAGE/deconnexion/deconnexion.png" ></form></li>
            </ul>
        </nav>
         <!--LES RESSOURCES RECOLTES DU PRODUIT VENDU PAR LE CLIENT-->
        <main class="container">    
            <div class="row">
                <section class="col-12">
                    <h1 style="color : #3a86c0;">Les métaux récupérés grâce à vos ventes</h1>
                    <p style="color : #3a86c0;">Vous avez fait un total de  <?=$total_extraction_client['COUNT(customer)']?> extraction(s)</p>
                    <table class="table">
                        <thead>
                            <th>element</th>
                            <th>quantitée</th>
                        </thead>
                        <tbody> 
                            <?php while($extraction_client=mysqli_fetch_assoc($exec4)):?>
                                <tr>
                                    <td><?= $extraction_client['name']?></td>
                                    <td><?= $extraction_client['quantity']?></td>
                                </tr> 
                            <?php endwhile;?>
                        </tbody>    
                    </table>
                </section>
            </div>
        </main>
    </body>
</html>




