<?php
require("../../3_CONNECTER/BD/db.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../5_IMAGE/logo/YADE_logo.ico" />
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/all.css">
    <link rel="stylesheet" href="./achat.css">
    <title>Yade - Pour un monde qui change</title>
</head>
<body>

    <nav>
        <form action="../../index.php"><input type="image" class="icon" alt="YADE_logo" width="170px" src="../../5_IMAGE/logo/YADE_logo.png"></form>

        <ul>
            <li class="pos achat"><form   action="#" ><input class="bn632-hover bn26 " type="submit" value="ACHAT"></form></li>
            <li class="pos vente"><form   action="../3_PAGE_VENTE/vente.php" ><input class="bn632-hover bn26 " type="submit" value="VENTE"></form></li>
            <li class="pos connexion"><form action="../../2_CONNEXION/connexion.php"><input type="submit" class="bn632-hover bn22 " value="Connexion"></form></li>
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
$nom_recherche = $_GET["Carte_Graphique"];
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
            ?>
            <form method="post"> <input class="button_price" name="achat" type="submit" value="<?=$res1["price"]?>"></form>
            
            </div>

    <?php endwhile ?>
</div>
<?php

if(isset($_POST["achat"])){?>
    <script>
        alert("Pour procéder à un achat, veuillez vous connecter.");
    </script>
<?php
}

}

if(isset($_GET["Processeur"])){
$nom_recherche=$_GET["Processeur"];
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
            ?>
            <form method="post"> <input class="button_price" name="achat" type="submit" value="<?=$res1["price"]?>"></form>
            
            </div>

    <?php endwhile ?>
</div>
<?php
if(isset($_POST["achat"])){?>
    <script>
        alert("Pour procéder à un achat, veuillez vous connecter.");
    </script>
<?php
}
}


if(isset($_GET["Carte_Mere"])){
    $nom_recherche=$_GET["Carte_Mere"];
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
                ?>
                <form method="post"> <input class="button_price" name="achat" type="submit" value="<?=$res1["price"]?>"></form>
                
                </div>

        <?php endwhile ?>
    </div>
    <?php
    if(isset($_POST["achat"])){?>
        <script>
            alert("Pour procéder à un achat, veuillez vous connecter.")
        </script>
    <?php
    }
}
?>
</html>
    
</body>
</html>