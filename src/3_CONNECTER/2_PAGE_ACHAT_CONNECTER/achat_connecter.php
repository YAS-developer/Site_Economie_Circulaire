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
        <link rel="stylesheet" href="./achat_connecter.css">
        <link rel="icon" href="../../5_IMAGE/logo/YADE_logo.ico"/>
        <title>Yade - Pour un monde qui change</title>
    </head>
    <body>
        <nav>
            <form class="gauche" action="../1_PAGE_ACCUEIL_CONNECTER/connecter.php"><input type="image" class="icon" alt="YADE_logo" width="170px" src="../../5_IMAGE/logo/YADE_logo.png"></form>
            <ul>
                <li class="pos achat" ><form action="#" ><input style="font-family :Arial, sans-serif;" class="bn632-hover bn26" type="submit" value="ACHAT"></form></li>
                <li class="pos vente" ><form action="../3_PAGE_VENTE_CONNECTER/vente_connecter.php" ><input style="font-family :Arial, sans-serif;" class="bn632-hover bn26" type="submit" value="VENTE"></form></li>
                <li class="pos"><pre><p style="font-family :Arial, sans-serif;" class="cssanimation sequence elevateRight">Bonjour   <?=$_SESSION['prenom'].'  '.$_SESSION['nom']?></p></pre></li>
                <li class="pos"><form action="../4_PAGE_RECHARGER_CAGNOTTE/recharger_cagnotte.php" method="post"><input style="font-family :Arial, sans-serif;" class="bn632-hover bn22" type="submit" value ="Cagnotte:<?=$_SESSION['cagnotte']?> €"></form></li>
                <li class="pos"><form class="droit" action="../5_DECONNEXION/disconnect.php" method="post"><input type="image"  width="45px"alt="bouton_deconnexion" src="../../5_IMAGE/deconnexion/deconnexion.png" ></form></li>
            </ul>
        </nav> 

    <h1>Rechercher des articles que vous voulez achetez !</h1>

    <form method="GET">
    <div class = "filtre">
        
            <input class="tourne bout" type="submit" name="Carte_Graphique" value="Carte graphique">
            <input class="tourne bout" type="submit" name="Processeur" value="Processeur">
            <input class="bout" type="submit" name="Carte_Mere" value="Carte Mere">
        
    </div>
    </form>

<?php
if(isset($_GET["Carte_Graphique"])){
    $nom_recherche = mysqli_real_escape_string($db,$_GET["Carte_Graphique"]);
    $req1="SELECT * FROM typeitem ti JOIN businesssell bb on ti.id_typeitem = bb.typeitem JOIN business b on b.id=bb.business where name LIKE '%$nom_recherche%' ORDER BY distance ASC" ;
    $exec1= mysqli_query($db, $req1);?>


    <div>
        <?php
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
                echo "<br>";
                ?>
                <form method="post"> <input class="button_price" name="achat" type="submit" value="<?=$res1["price"]?>"></form>
                
                </div>

        <?php endwhile ?>
    </div>
    <?php

    if(isset($_POST["achat"])){
        $prix = $_POST["achat"];
        if($prix > $_SESSION["cagnotte"]){?>
        <script>
            alert("Vous n'avez pas assez d'argent dans votre cagnotte, veuillez recharger votre cagnotte !")
        </script>
    <?php

        }
        if($prix <= $_SESSION["cagnotte"]){
            $sous = $_SESSION["cagnotte"] - $prix;

            $req ="UPDATE customer SET stash = $sous WHERE login = '".$_SESSION['login']."'";
            $exe = mysqli_query($db, $req);
            
            ?>
            <script>
                alert("Votre achat de <?=$prix?> à bien été validé !");
                </script>
                <?php
        }
    }
}

if(isset($_GET["Processeur"])){
    $nom_recherche= mysqli_real_escape_string($db,$_GET["Processeur"]);
    $req1="SELECT * FROM typeitem ti JOIN businesssell bb on ti.id_typeitem = bb.typeitem JOIN business b on b.id=bb.business where name LIKE '%$nom_recherche%' ORDER BY distance ASC" ;
    $exec1= mysqli_query($db, $req1);?>

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
                echo "<br>";
                ?>
                <form method="post"> <input class="button_price" name="achat" type="submit" value="<?=$res1["price"]?>"></form>
                
                </div>

        <?php endwhile ?>
    </div>
    <?php
    if(isset($_POST["achat"])){
        $prix = $_POST["achat"];
        if($prix > $_SESSION["cagnotte"]){?>
        <script>
            alert("Vous n'avez pas assez d'argent dans votre cagnotte, veuillez recharger votre cagnotte !")
        </script>
    <?php
    
        }
        if($prix <= $_SESSION["cagnotte"]){
            $sous = $_SESSION["cagnotte"] - $prix;
    
            $req ="UPDATE customer SET stash = $sous WHERE login = '".$_SESSION['login']."'";
            $exe = mysqli_query($db, $req);
            
            ?>
            <script>
                alert("Votre achat de <?=$prix?> à bien été validé !");
                </script>
                <?php
        }
        
    }
}


if(isset($_GET["Carte_Mere"])){
        $nom_recherche=mysqli_real_escape_string($db,$_GET["Carte_Mere"]);
        $req1="SELECT * FROM typeitem ti JOIN businesssell bb on ti.id_typeitem = bb.typeitem JOIN business b on b.id=bb.business where name LIKE '%$nom_recherche%' ORDER BY distance ASC" ;
        $exec1= mysqli_query($db, $req1);?>
    
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
                    echo "<br>";
                    ?>
                    <form method="post"> <input class="button_price" name="achat" type="submit" value="<?=$res1["price"]?>"></form>
                    
                    </div>
    
            <?php endwhile ?>
        </div>
        <?php
        // 
        if(isset($_POST["achat"])){
            $prix = $_POST["achat"];
            // SI LE PRIX SUPERIEUR A LA CAGNOTTE 
            if($prix > $_SESSION["cagnotte"]){?>
            <script>
                alert("Vous n'avez pas assez d'argent dans votre cagnotte, veuillez recharger votre cagnotte !")
            </script>
        <?php
            // SI LE PRIX INFERIEUR OU EGALE A LA CAGNOTTE 
            }
            if($prix <= $_SESSION["cagnotte"]){
                $sous = $_SESSION["cagnotte"] - $prix;
        
                $req ="UPDATE customer SET stash = $sous WHERE login = '".$_SESSION['login']."'";
                $exe = mysqli_query($db, $req);
                ?>
                <script>
                    alert("Votre achat de <?=$prix?> € à bien été validé !")
                </script>
                <?php
            }
        }
    }
?>
</body>
</html>