<?php
	require_once ("fonctions.php");
		session_start();
?>

<html>
<head>
	<title>Neige & Soleil</title>
<meta charset ="utf-8">
</head>
<body>
	<div id="container">
		<div id="header">
		<h1> Connexion </h1>
		<form method="post" action="">
		Pseudo : <input type="text" name="pseudonyme"> </br>
		Mot de Passe : <input type="password" name="mdpasse"> </br>
		<input type="submit" name="SeConnecter" value="Connexion"> </br>
		<a href="inscription.php"> Créer un compte </a> </br>
		</form>
	</div>
<?php
			if (isset($_POST['SeConnecter']))
			{
				$pseudo = $_POST['pseudonyme'];
				$mdp = $_POST['mdpasse'];
				$resultat = verif_connexion ($pseudo,$mdp);

				if ($resultat == null) {
					echo "<br/> Veuillez vérifier vos identifiants";
				} else {
					echo "<br/> Bienvenue ".$resultat["nomUtili"]." ".$resultat["prenomUtili"];

					$_SESSION['pseudonyme']=$resultat['pseudonyme'];
					$_SESSION['idUtili']=$resultat['idUtili'];
				}
			}
			if(isset($_SESSION['idUtili']))
				?>
				<div id="nav">
					<h2>Navigation</h2>
					<ul>
						<?php
				echo "<br/> <a href='index.php?page=1' Mon compte</a>";
				echo "<br/> <a href='index.php?page=2' Mes réservations</a>";
				echo "<br/> <a href='index.php?page=3' Mes appartements</a>";
				echo "<br/> <a href='index.php?page=4' Se Déconnecter</a>";
		 ?>
	 </u1>
 </div>
 <?php
 if (isset($_GET['page'])) {
	 $page=$_GET['page'];
 }else {
	 $page= 0;
 }
 switch ($page) {

					 case 4 :
					 session_start();

$_SESSION = array();
session_destroy();
header('Location: index.php?page=0');
						 break;

 }

?>
	</body>
	</html>
