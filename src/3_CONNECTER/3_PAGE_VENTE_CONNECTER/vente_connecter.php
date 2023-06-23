<?php

require("../BD/db.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="../CSS/all.css">
        <link rel="stylesheet" href="../CSS/nav.css">
        <link rel="stylesheet" href="./vente_connecter.css">
        <link rel="icon" href="../../5_IMAGE/logo/YADE_logo.ico"/>
        <title>Yade - Pour un monde qui change</title>
    </head>
    <body>
        <nav>
            <form class="gauche" action="../1_PAGE_ACCUEIL_CONNECTER/connecter.php"><input type="image" class="icon" alt="YADE_logo" width="170px" src="../../5_IMAGE/logo/YADE_logo.png"></form>

            <ul>
                <li class="pos achat" ><form action="../2_PAGE_ACHAT_CONNECTER/achat_connecter.php" ><input style="font-family :Arial, sans-serif;" class="bn632-hover bn26" type="submit" value="ACHAT"></form></li>
                <li class="pos vente" ><form action="#" ><input style="font-family :Arial, sans-serif;" class="bn632-hover bn26" type="submit" value="VENTE"></form></li>
                <li class="pos"><pre><p style="font-family :Arial, sans-serif;" class="cssanimation sequence elevateRight">Bonjour   <?=$_SESSION['prenom'].'  '.$_SESSION['nom']?></p></pre></li>
                <li class="pos"><form action="../4_PAGE_RECHARGER_CAGNOTTE/recharger_cagnotte.php" method="post"><input style="font-family :Arial, sans-serif;" class="bn632-hover bn22" type="submit" value ="Cagnotte:<?=$_SESSION['cagnotte']?> €"></form></li>
                <li class="pos"><form  class="droit" action="../5_DECONNEXION/disconnect.php" method="post"><input type="image"  width="45px"alt="bouton_deconnexion" src="../../5_IMAGE/deconnexion/deconnexion.png" ></form></li>
            </ul>
        </nav> 
    </body>
</html>

<h1>Rechercher des articles que vous pouvez vendre !</h1>
<form  class="barre_recherche" method="get">
    <input name="nom_recherche" type="search" id="form1" placeholder="Carte graphique, Processeur, Carte Mere" class="form-control" />
    <input name="recherche"class="btn btn-primary" type="submit" value="Recherche"><i class="fas fa-search"></i>
</form>


<?php 
    if(isset($_GET["recherche"])){
        if(isset($_GET["nom_recherche"])){
            $nom_recherche = mysqli_real_escape_string($db,$_GET["nom_recherche"]); 
            $req1="SELECT * FROM typeitem ti JOIN businessbuy bb on ti.id_typeitem = bb.typeitem JOIN business b on b.id=bb.business where name LIKE '%$nom_recherche%' ORDER BY distance ASC" ;
            $exec1= mysqli_query($db, $req1);
?>
            <div>
                <?php
                    // BOUCLE POUR AVOIR LE NOM ET L'IMAGE DU PRODUIT
                    while($res1 = mysqli_fetch_array($exec1)):?>
                        <div class="produit">
                        <?php
                        echo $res1['name'];
                        echo "<br>";
                        ?>
                        <img width="250px" src="<?=$res1['image']?>" alt="image_produit">
                        
                        <?php       
                        echo "<br>";
                        $req2="SELECT * from typeitemdetails where typeitem='".$res1['id_typeitem']."'" ;
                        $exec2= mysqli_query($db, $req2);
                        echo "<br>";
                        echo "Caracteristiques : <br><br>";
                        // BOUCLE POUR LES CARACTERISTIQUES PRODUITS
                        while($res2 = mysqli_fetch_array($exec2)){
                            echo $res2['attribute'];
                            echo ": ";
                            echo $res2['value'];
                            echo "<br>";
                        }
                        echo "<br>";


                        echo "<br><br>";

                        echo "Entreprise souhaitant acheter ce produit : "; echo $res1['company']; echo "<br><br>";
                        echo "Distance : "; echo $res1['distance']; echo " Km de chez vous";

                        echo "<br><br>";
                        
                        echo "Prix en euros : ";
                        ?>
                        <form method="post"> <input class="button_price" name="vente" type="submit" value="<?=$res1["price"]?>"></form>
                        
                        </div>

                    <?php endwhile ?>
            </div>
    <?php               
        }
    }
    
    if(isset($_POST['vente'])){
        
        $prix = $_POST['vente'];
        $_SESSION['cagnotte']+= $prix;
        $ajout_cagnotte = $_SESSION['cagnotte'];

        $req3 = "UPDATE customer SET stash = ".$ajout_cagnotte."  WHERE login='".$_SESSION['login']."' ";
            
        $exec3 = mysqli_query($db, $req3);


        $req4 = "SELECT * FROM customer WHERE login='".$_SESSION['login']."'";

        $exec4 = mysqli_query($db, $req4);
        $res4 = mysqli_fetch_assoc($exec4);

        $_SESSION['id_login'] = $res4['id'];

        $req5= "SELECT element, quantityy  from businessbuy bb JOIN typeitem ti ON bb.typeitem = ti.id_typeitem  JOIN  extractionfromtypeitem efti ON ti.id_typeitem =efti.typeItem WHERE bb.price = ".$prix." ";

        $exec5= mysqli_query($db, $req5);

        // INSERER LES RESSOURCES RECOLTES DU PRODUIT VENDU PAR LE CLIENT DANS L'ACCUEIL 
        while ($res5= mysqli_fetch_assoc($exec5)){
            $req7 = "INSERT INTO customerextraction (Customer, element, quantity) VALUES (".$_SESSION['id_login'].",".$res5['element'].", ".$res5['quantityy'].") ";
            $exec7 = mysqli_query($db,$req7);
        }?>
        <script>
            alert("Votre vente de <?= $prix ?> € a bien été pris en compte. Veuillez vous rendre dans votre page d'accueil pour actualiser votre cagnotte.");
        </script>
    <?php
    }               
    ?>

