

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="icon" href="../../5_IMAGE/logo/YADE_logo.ico" />
    <link rel="stylesheet" href="../../2_CSS/index.css">
    <title>Connexion</title>
</head>
<body>
    <!-- <form id="form_connexion" method="post" action="./connecter.php" onsubmit="return check();">
        <label for="log">login :</label><br>
        <input id="log" type="text" name="login"><br>
        <p id="error"></p>
        <input type="submit" value="Connexion" name="envoyer">
    </form>
     -->

  <div id="login-form-wrap">
    <h2 style="color: #3ca9e2 ">Connexion Client</h2>
    <form id="login-form" method="post" action="../3_CONNECTER/1_PAGE_ACCUEIL_CONNECTER/connecter.php" onsubmit="return check();">
      <p>
      <input type="text" id="log" name="login" placeholder="login" ><i class="validation"><span></span><span></span></i>
      </p>
      <p>
      <p id="error"></p>
      <input type="submit" id="login" name="envoyer" value="Connexion">
      </p>
    </form>
    <div id="create-account-wrap">
    </div>
  </div>
    <script src="check.js"></script>
</body>

</html>


