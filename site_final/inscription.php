<?php
	require_once ("fonctions.php");
		session_start();
?>

<html>
	<head>
		<title>Inscription</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div id="banner1">
			<div id="logo">
				<img src="soleil.png" alt="" />
			</div>
		</div>
		<nav class="nav nav-pills nav-fill">
<a class="nav-link nav-item" href="index.php">Accueil</a>
<a class="nav-link nav-item" href="connexion.php">Connexion</a>
<a class="nav-link nav-item" href="contact.php">Contact</a>
<a class="nav-link nav-item" href="news.php">News</a>
</nav>

		<div id="banner2">
		</div>

		<div id="contenuprincipal">
			<center>
	      <a href="index.php"> Retour </a> </br>



	    </br>
			<form method="post" action="inscription.php">
				Type compte : <select name="typeC">
    <option value="">Veuillez choisir le type de compte</option>
    <option value="proprietaire">Propriétaire</option>
    <option value="utilisateurs">Utilisateur</option>
	</select></br></br>
        Pseudo : <input type="text" name="pseudonyme"> </br></br>
        Nom : <input type="text" name="nomUtili"></br></br>
				Prenom : <input type="text" name="prenomUtili"></br></br>
				Code Postal : <input type="number" name="codepostUtili"></br></br>
				Email : <input type="email" name="emailUtili"></br></br>
				Adresse : <input type="text" name="adresseUtili"></br></br>
				Date de naissance : <input type="date" name="DateNaissUtili"></br></br>
				Mot de passe : <input type="password" name="mdpasseUtili"></br></br>
				Confirmez le mot de passe : <input type="password" name="repeatpassword"><br><br></br>
        <input type="submit" name="submit" value="Valider">

    </form>

<?php

if (isset($_POST['submit']))
{
$TypeC = htmlspecialchars(trim($_POST['typeC']));
$Nom = htmlspecialchars(trim($_POST['nomUtili']));
$Adresse = htmlspecialchars(trim($_POST['adresseUtili']));
$Prenom = htmlspecialchars(trim($_POST['prenomUtili']));
$Pseudo = htmlspecialchars(trim($_POST['pseudonyme']));
$Email = htmlspecialchars(trim($_POST['emailUtili']));
$Datenais = htmlspecialchars(trim($_POST['DateNaissUtili']));
$Codepost = htmlspecialchars(trim($_POST['codepostUtili']));
$password = htmlspecialchars(trim($_POST['mdpasseUtili']));
$repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));

if ($TypeC&&$Nom&&$Adresse&&$Pseudo&&$Codepost&&$Datenais&&$Prenom&&$Email&&$password&&$repeatpassword)
        {
        if (strlen($password)>=6)
            {
                if ($password==$repeatpassword)
                {
            // On crypte le mot de passe
                

 // on se connecte à MySQL et on sélectionne la base
    $con = mysqli_connect("localhost","root","","GESTION_N_S");

 //On créé la requête
 $sql = "insert into ".$_POST["typeC"]." values (null ,'".$_POST["pseudonyme"]."',password('".$_POST["mdpasseUtili"]."'),'".$_POST["nomUtili"]."','".$_POST["prenomUtili"]."','".$_POST["adresseUtili"]."',
 '".$_POST["codepostUtili"]."','".$_POST["DateNaissUtili"]."','".$_POST["emailUtili"]."');";
 $sql = mysqli_query($con,$sql);
       // on ferme la connexion
mysqli_close($con);

}else echo "Les mots de passe ne sont pas identiques";
}else echo "Le mot de passe est trop court !";
}else echo "Veuillez saisir tous les champs !";
 echo "Inscription réussie !";
}

?>
	</br>
	</br></br>
	</br>
	</center>
		</div>

		<div id="footer">
			<p>Neige & Soleil | Tous droits réservés</p>
		</div>
	</body>
</html>
