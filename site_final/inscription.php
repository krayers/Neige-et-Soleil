<?php
	require_once ("fonctions.php");
		session_start();
?>

<html>
	<head>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div id="banner1">
			<div id="logo">
				<img src="soleil.png" alt="" />
			</div>
		</div>
		<div id="menu">
	<ul>
		<li><a href="index.php"><FONT face="Verdana">Accueil</font></a></li>
		<li><a href="connexion.php"><FONT face="Verdana">Connexion</font></a></li>
		<li><a href="contact.php"><FONT face="Verdana">Contact</font></a></li>
    <li><a href="news.php"><FONT face="Verdana">News</font></a></li>

	</ul>
</div>

		<div id="banner2">
		</div>

		<div id="contenuprincipal">
			<center>
	      <a href="index.php"> Retour </a> </br>



	    </br>
			<form method="post" action="inscription.php">
        Pseudo : <input type="text" name="pseudonyme"> </br>
        Nom : <input type="text" name="nomUtili"></br>
				Prenom : <input type="text" name="prenomUtili"></br>
				Code Postal : <input type="number" name="codepostUtili"></br>
				Email : <input type="email" name="emailUtili"></br>
				Adresse : <input type="text" name="adresseUtili"></br>
				Date de naissance : <input type="date" name="DateNaissUtili"></br>
				Mot de passe : <input type="password" name="mdpasseUtili"></br>
				Confirmez le mot de passe : <input type="password" name="repeatpassword"><br><br>
        <input type="submit" name="submit" value="Valider">

    </form>

<?php

if (isset($_POST['submit']))
{

$Nom = htmlspecialchars(trim($_POST['nomUtili']));
$Adresse = htmlspecialchars(trim($_POST['adresseUtili']));
$Prenom = htmlspecialchars(trim($_POST['prenomUtili']));
$Pseudo = htmlspecialchars(trim($_POST['pseudonyme']));
$Email = htmlspecialchars(trim($_POST['emailUtili']));
$Datenais = htmlspecialchars(trim($_POST['emailUtili']));
$Codepost = htmlspecialchars(trim($_POST['codepostUtili']));
$password = htmlspecialchars(trim($_POST['mdpasseUtili']));
$repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));

if ($Nom&&$Adresse&&$Pseudo&&$Codepost&&$Datenais&&$Prenom&&$Email&&$password&&$repeatpassword)
        {
        if (strlen($password)>=6)
            {
                if ($password==$repeatpassword)
                {
            // On crypte le mot de passe
                $password = md5($password);

 // on se connecte à MySQL et on sélectionne la base
    $con = mysqli_connect("localhost","root","","GESTION_N_S");

 //On créé la requête
 $sql = "insert into Utilisateurs (idUtili,pseudonyme,mdpasse,nomUtili,prenomUtili,adresseUtili,codepostUtili,DateNaissUtili,emailUtili) values (null ,'".$_POST["pseudonyme"]."',password('".$_POST["mdpasseUtili"]."'),'".$_POST["nomUtili"]."','".$_POST["prenomUtili"]."','".$_POST["adresseUtili"]."',
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
