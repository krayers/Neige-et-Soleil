<html>
<head>


    <title>Inscription</title>



</head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<center>
<h1>Inscription<h1>
	<a href="index.php"> Accueil </a> </br>
      <form method="post" action="inscription.php">
        Nom : <input type="text" name="nomUtili"> </br>
        Prenom : <input type="text" name="prenomUtili"> </br>
        Pseudo : <input type="text" name="pseudonyme"> </br>
        Mot de passe : <input type="password" name="mdpasse"> </br>
        Adresse : <input type="text" name="adresseUtili"> </br>
        Code Postal : <input type="number" name="codepostUtili"> </br>
        Date de naissance : <input type="date" name="DateNaissUtili"> </br>
          <input type="submit" name="submit" value="Valider">

      </form>

    <?php

    if (isset($_POST['submit']))
    {

    $nom = $_POST['nomUtili'];
    $prenom = $_POST['prenomUtili'];
    $pseudo = $_POST['pseudonyme'];
    $mdp = $_POST['mdpasse'];
    $adresse = $_POST['adresseUtili'];
    $codepost = $_POST['codepostUtili'];
    $datenai = $_POST['DateNaissUtili'];

    if ($nom&&$prenom&&$pseudo&&$mdp&&$adresse&&$codepost&&$datenai)
          {


    $con = mysqli_connect("localhost","root","","gestion_n_s");

    $sql = "insert into Utilisateurs values (null,'".$pseudo."','".$mdp."','".$nom."','".$prenom."','".$adresse."','".$codepost."','".$datenai."');";

    $resultats= mysqli_query($con, $sql);
    mysqli_close($con);
    echo "$sql";


    }else echo "Veuillez saisir tous les champs !";

    }


?>
</center>
</body>
</html>
