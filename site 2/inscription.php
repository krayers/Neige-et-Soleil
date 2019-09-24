<?php
	require_once ("fonctions.php");
		session_start();
?>

<html>
	<head>
		<title>Accueil</title>
		<link href="style.css" rel="stylesheet">
		<link href="bootstrap.min.css" rel="stylesheet">

	</head>
	<body>
		<div id="banner1">
			<div id="logo">
				<img src="soleil.png" alt="" />
			</div>
		</div>
		<nav class="nav nav-pills nav-fill">
<a class="nav-link active nav-item" href="index.php">Accueil</a>
<a class="nav-link nav-item" href="connexion.php">Connexion</a>
<a class="nav-link nav-item" href="contact.php">Contact</a>
<a class="nav-link nav-item" href="news.php">News</a>
		
	
</div>

		<div id="banner2">
		</div>

<div id="contenuprincipal">
			<center>
	      <a href="index.php"> Retour </a> </br>

		<div id="inscription">
		</div>
	    </br>
			<form method="post" action="inscription.php">
        		<ul class="form-style-1">
    <label> Pseudo :<span class="required"></span></label>
    <input type="text" name="pseudonyme" class="field-long" />
    
    <li><label> Nom :<span class="required"></span></label>
    <input type="text" name="prenomUtili" class="field-divided" placeholder="Prenom" /> 
    <input type="text" name="nomUtili" class="field-divided" placeholder="Nom de Famille" /></li>
    
    <li>
    <label>Email :<span class="required"></span></label>
    <input type="email" name="emailUtili" class="field-long" />
    </li>
    
    <li>
    <label> Adresse :<span class="required"></span></label>
    <input type="text" name="adresseUtili" class="field-long" />
    </li>
    
    <li>
    <label>Code Postal :<span class="required"></span></label>
    <input type="number" name="codepostUtili" class="field-long" />
    </li>
    
    <li>
    <label> Date Naissance :<span class="required"></span></label>
    <input type="date" name="DateNaissUtili" class="field-long" />
    </li>

    <li>
    <label> Mot de passe :<span class="required"></span></label>
    <input type="password" name="mdpasseUtili" class="field-long" />
    </li>

     <li>
    <label> Confirmer le Mot de passe :<span class="required"></span></label>
    <input type="password" name="repeatpassword" class="field-long" />
    </li>

</ul>
</form>
      
        <input type="submit" name="submit" value="Valider"/>
    
    <div id="contenuprincipal">
			<center>
	      <a href="index.php"> Retour </a> </br>


    
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
