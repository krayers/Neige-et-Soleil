<html>
	<head>
		<title>Administrateur</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="bootstrap.min.css" rel="stylesheet">
	</head>
	<body>


<div id="banner2">
</div>

<div id="contenuprincipal">
	<center>
	<p><form id='login' action='admin.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Pseudo</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='pseudonyme' >Pseudo:</label>
<input type='text' class="form-group" name='pseudonyme' id='pseudo'  maxlength="50" />

<label for='mdpasee' >Mot de passe:</label>
<input type='password' class="form-group" name='mdpasse' id='mdpasse' maxlength="50" />

<input type='submit' name='SeConnecter' value='Connexion' /></br>
<a href="index.php"><FONT face="Verdana">Retour</font></a>
</center>

</fieldset>
</form>
<?php
require_once ("fonctions.php");
session_name('admin');
session_start(); //demarrage session
if (isset($_POST['SeConnecter']))
{
$pseudo = $_POST['pseudonyme'];
$mdp = $_POST['mdpasse'];
$resultat = verif_admin ($pseudo, $mdp);
//var_dump($resultat);
if ($resultat == null) {
	echo "<br/> Veuillez vérifier vos identifiants";
} else {
	echo


	$_SESSION['pseudonyme']=$resultat['pseudonyme'];
	$_SESSION['idUtili']=$resultat['idUtili'];
}
}
if(isset($_SESSION['idUtili']))
{
?>
<nav id="nav">
	<h2>Navigation</h2>
	<ul>
	<?php
		echo "<br/> <a href='admin.php?page=1'> Modifier mes informations </a>";
		echo "<br/> <a href='admin.php?page=2'> Mon compte </a>";
		echo "<br/> <a href='admin.php?page=3'> Mes reservations </a>";
		echo "<br/> <a href='admin.php?page=4'> Mes contrats </a>";
		echo "<br/> <a href='admin.php?page=5'> Tous les appartements </a>";
		echo "<br/> <a href='connexion.php?page=6'> Réserver un appartement </a>";
		echo "<br/> <a href='connexion.php?page=7'> Contrats pré-enregistrés </a>";
		echo "<br/> <a href='connexion.php?page=8'> Nouveau contrat de gestion </a>";
		echo "<br/> <a href='admin.php?page=9'> Se Déconnecter</a>";

?></ul>
</nav>
</div>
<center>
<?php
if (isset($_GET['page'])) {
	$page=$_GET['page'];
}else {
	$page= 0;
}
switch ($page) {
	case 1 :
			?>
			<form method="post" action="">
				Nom : <input type="text" name="nomUtili"> </br>
				Prenom : <input type="text" name="prenomUtili"> </br>
				Nouveau Mot de passe : <input type="password" name="mdpasse" > </br>
				Adresse : <input type="text" name="adresseUtili"> </br>
				Code Postal : <input type="number" name="codepostUtili"> </br>
				Date de naissance : <input type="date" name="DateNaissUtili"> </br>
					<input type="submit" name="submit" value="Valider">

			</form>

			<?php

			if (isset($_POST['submit']))
	{
	$idut=$_SESSION['idUtili'];
	$nom = $_POST['nomUtili'];
	$prenom = $_POST['prenomUtili'];
	$mdp = $_POST['mdpasse'];
	$adresse = $_POST['adresseUtili'];
	$codepost = $_POST['codepostUtili'];
	$datenai = $_POST['DateNaissUtili'];




	$con = mysqli_connect("localhost","root","","GESTION_N_S");

	$sql = "UPDATE Utilisateurs SET nomUtili = '$nom', prenomUtili = '$prenom', mdpasse = '$mdp', adresseUtili = '$adresse',codepostUtili = '$codepost',DateNaissUtili = '$datenai',  WHERE idUtili = '$idut';";

	$resultats= mysqli_query($con, $sql);
	mysqli_close($con);
	echo "La modification a été réalisée avec succès";




	}





			break;
			case 2 :
    		//appel de la fonction
    		$lesLignes=selectAdmin($_SESSION['idUtili']);
    		//var_dump($lesLignes);

    		echo "
    		<table border=1>
    		<tr><td> Numéro d'utilisateur </td><td>Pseudo </td><td>Nom </td>
    		<td> Prénom</td>
    		<td> Adresse postale </td></tr>
    		";
    		//parcourir les lignes et les afficher dans la table
    		foreach ($lesLignes as $uneLigne) {
    			echo "<tr><td>".$uneLigne['idUtili']."</td>
    			<td>".$uneLigne['pseudonyme']."</td>
    			</tr>";
    		}
    		echo "</table>";
    		break;
				case 3 :
				$mesObjets= selectReservUtili($_SESSION['idUtili']);
					echo "
					<table border=1>
					<tr><td> Numéro de reservation </td><td>Temps</td>
					<td> Duree</td> <td> Prix en euros</td>
					<td> Date Debut </td> <td> Date Fin </td><td> Numero Appartement </td></tr>
					";
					//parcourir les lignes et les afficher dans la table
					foreach ($mesObjets as $uneLigne) {
						echo "<tr><td>".$uneLigne['idReservation']."</td>
						<td>".$uneLigne['ptemps']."</td>
						<td>".$uneLigne['duree']."</td>
						<td>".$uneLigne['PrixLoc']."</td>
						<td>".$uneLigne['DateDebut']."</td>
						<td>".$uneLigne['DateFin']."</td>
						<td>".$uneLigne['idAppart']."</td>
						</tr>";
					}
					echo "</table>";?>
				</br>Reservation à supprimer : <input type="number" name="idReservation"> </br>
					<input type="submit" name="submit" value="Supprimer votre reservation">

				</form>

				<?php


				if (isset($_POST['submit']))
				{
$numR = $_POST['idReservation'];

						// on se connecte à MySQL et on sélectionne la base
					$con = mysqli_connect("localhost","root","","GESTION_N_S");

				//On créé la requête
				$sql = "DELETE FROM Reservation WHERE idReservation =$numR;";

				// On envoie la requête
				$resultats= mysqli_query($con, $sql);
					// on ferme la connexion
				 mysqli_close($con);
				 echo "La reservation a bien été supprimée.";
			 }


					break;
					case 5 :
					//appel de la fonction
					$lesLignes=selectAllObjetsVente();
					//var_dump($lesLignes);
					echo "
					<table border=1>
					<tr><td> Numéro d'appartement</td><td>Adresse</td>
					<td> Ville</td><td> Description </td><td> Prix en euros/jour</td><td> Prix en euros/semaine</td></tr>
					";
					//parcourir les lignes et les afficher dans la table
					foreach ($lesLignes as $uneLigne) {
						echo "<tr><td>".$uneLigne['idAppart']."</td>
						<td>".$uneLigne['Adresse']."</td>
						<td>".$uneLigne['ville']."</td>
						<td>".$uneLigne['description']."</td>
						<td>".$uneLigne['prixj']."</td>
						<td>".$uneLigne['prixs']."</td>
						</tr>";
					}
					echo "</table>";
					break;
					case 6 :
					//appel de la fonction
					$lesLignes=selectAllObjetsVente();
					//var_dump($lesLignes);
					echo "
					<table border=1>
					<tr><td> Numéro d'appartement</td><td>Adresse</td>
					<td> Ville</td><td> Description </td><td> Prix en euros/jour</td><td> Prix en euros/semaine</td></tr>
					";
					//parcourir les lignes et les afficher dans la table
					foreach ($lesLignes as $uneLigne) {
						echo "<tr><td>".$uneLigne['idAppart']."</td>
						<td>".$uneLigne['Adresse']."</td>
						<td>".$uneLigne['ville']."</td>
						<td>".$uneLigne['description']."</td>
						<td>".$uneLigne['prixj']."</td>
						<td>".$uneLigne['prixs']."</td>
						</tr>";
					}
					echo "</table>";?>
				</br></br>	<form method="post" action="">
						Numéro appartement (voir tableau) : <input type="number" name="idAppart"> </br>
						Temps reservation : <input type="radio" name="ptemps" value="Jours" checked> Jours <input type="radio" name="ptemps" value="Semaines"> Semaines </br>
						Nombre : <input type="number" name="duree"> </br>
						Prix par rapport à votre durée (prix indiqué dans le tableau) : <input type="number" name="PrixLoc"> </br>
						Date d'arrivée : <input type="date" name="DateDebut"> </br>
						Date de départ : <input type="date" name="DateFin"> </br>
						<input type="submit" name="submit" value="Valider">

					</form>

					<?php

					if (isset($_POST['submit']))
					{

						$datede = $_POST['idAppart'];
						$commentaire = $_POST['PrixLoc'];
						$pte = $_POST['ptemps'];
						$ptee = $_POST['duree'];
						$lieulivraison = $_POST['DateDebut'];
						$typeoper = $_POST['DateFin'];

						if ($datede&&$commentaire&&$pte&&$ptee&&$lieulivraison&&$typeoper)
							{


							// on se connecte à MySQL et on sélectionne la base
						$con = mysqli_connect("localhost","root","","GESTION_N_S");

					//On créé la requête
					$sql = "insert into Reservation values (null,'".$pte."',".$ptee.",".$commentaire.",'".$lieulivraison."','".$typeoper."',".$datede.", null, ".$_SESSION['idUtili'].");";

					// On envoie la requête
					$resultats= mysqli_query($con, $sql);
						// on ferme la connexion
					 mysqli_close($con);
					 echo "La reservation a bien été enregistrée, vous recevrez une réponse dans les prochains jours.";
				 }else echo "Veuillez saisir tous les champs !";

			 }
					break;
							case 7 :
				    		//appel de la fonction
				    		$lesLignes=selectContratsGest($_SESSION['idUtili']);
				    		//var_dump($lesLignes);

				    		echo "
				    		<table border=1>
				    		<tr><td> Numéro du contrat </td><td>Prix du contrat </td><td>Date debut </td>
				    		<td> Date fin</td><td> Numéro utilisateur </td>
				    		<td>Adresse</td><td>Ville</td><td> Description</td></tr>
				    		";
				    		//parcourir les lignes et les afficher dans la table
				    		foreach ($lesLignes as $uneLigne) {
				    			echo "<tr><td>".$uneLigne['idContratGest']."</td>
				    			<td>".$uneLigne['PrixGestContrat']."</td>
				    			<td>".$uneLigne['DateDebut']."</td>
				    			<td>".$uneLigne['DateFin']."</td>
									<td>".$uneLigne['idUtili']."</td>
									<td>".$uneLigne['Adresse']."</td>
									<td>".$uneLigne['ville']."</td>
									<td>".$uneLigne['description']."</td>
				    			</tr>";
				    		}
				    		echo "</table>";
				    		break;
							case 8 :
							?>
							<form method="post" action="">
								Prix du contrat : <input type="number" name="PrixGestContrat"> </br>
								Date fin contrat : <input type="date" name="DateDebut"> </br>
								Date fin contrat : <input type="date" name="DateFin"> </br>
								Identifiant propriétaire : <input type="number" name="idUtili"> </br>
								Adresse appartement : <input type="text" name="adresseUtili"> </br>
								Ville : <input type="text" name="villeUtili"> </br>
								Description : <input type="text" name="description"> </br>
								<input type="submit" name="submit" value="Valider">

							</form>

							<?php

							if (isset($_POST['submit']))
							{

								$datede = $_POST['PrixGestContrat'];
								$commentaire = $_POST['DateDebut'];
								$lieulivraison = $_POST['DateFin'];
								$typeoper2 = $_POST['adresseUtili'];
								$typeoper3 = $_POST['villeUtili'];
								$typeoper4 = $_POST['description'];

								if ($datede&&$commentaire&&$lieulivraison&&$typeoper2&&$typeoper3&&$typeoper4)
									{


									// on se connecte à MySQL et on sélectionne la base
								$con = mysqli_connect("localhost","root","","GESTION_N_S");

							//On créé la requête
							$sql = "insert into ContratGestion values (null,'".$datede."','".$commentaire."','".$lieulivraison."', ".$_SESSION['idUtili'].",'".$typeoper2."','".$typeoper3."','".$typeoper4."');";

							// On envoie la requête
							$resultats= mysqli_query($con, $sql);
								// on ferme la connexion
							 mysqli_close($con);
							 echo "Le contrat a été pré-ajouté avec succès !</br>";
							 echo "Rendez-vous à l'agence pour confirmer la réalisation du contrat</br>";
						 }else echo "Veuillez saisir tous les champs !";

					 }
							break;
							case 9 :
							session_start();

							// Suppression des variables de session et de la session
							$_SESSION = array();
							session_destroy();

							// Suppression des cookies de connexion automatique
							setcookie('login', '');
							setcookie('pass_hache', '');


							header('Location: admin.php');

}
}
?></center> </p>
</div>

<div id="footer">
	<p>Neige & Soleil | Tous droits réservés</p>
</div>
</body>
</html>
