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
<legend>Connexion au Back-End</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='pseudonyme' >Pseudo:</label>
<input type='text' name='pseudonyme' id='pseudo'  maxlength="50" />

<label for='mdpasee' >Mot de passe:</label>
<input type='password' name='mdpasse' id='mdpasse' maxlength="50" />

<input type='submit' name='SeConnecter' value='Connexion' /></br>
<a href="index.php"><FONT face="Verdana">Retour</font></a>
</center>

</fieldset>
</form>
<?php
require_once ("fonctions2.php");
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

		echo "<br/> <a href='admin.php?page=3'> Toutes les reservations </a>";
		echo "<br/> <a href='admin.php?page=4'> Tous les contrats </a>";
		echo "<br/> <a href='admin.php?page=5'> Tous les appartements </a>";
		echo "<br/> <a href='admin.php?page=2'> Ajouter un appartement </a>";
		echo "<br/> <a href='admin.php?page=6'> Tous les utilisateurs </a>";
		echo "<br/> <a href='admin.php?page=8'> Validation Contrat gestion </a>";
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
	case 2 :

	//appel de la fonction
	$lesLignes=selectContratV();
	//var_dump($lesLignes);

	echo "
	<table border=1>
	<tr><td> Numéro du contrat </td><td>Prix du Logement par Jour </td><td>Prix du Logement par Saison </td><td>Date debut </td>
	<td> Date fin</td><td> Numéro utilisateur </td>
	<td>Adresse</td><td>Ville</td><td> Description</td></tr>
	";
	//parcourir les lignes et les afficher dans la table
	foreach ($lesLignes as $uneLigne) {
		echo "<tr><td>".$uneLigne['idContratGestV']."</td>
		<td>".$uneLigne['prixgestcontratJ']."</td>
		<td>".$uneLigne['prixgestionS']."</td>
		<td>".$uneLigne['DateDebut']."</td>
		<td>".$uneLigne['DateFin']."</td>
		<td>".$uneLigne['idUtili']."</td>
		<td>".$uneLigne['Adresse']."</td>
		<td>".$uneLigne['ville']."</td>
		<td>".$uneLigne['description']."</td>
		</tr>";
	}
	echo "</table>";
	?>
	<br/>
	<form method="post" action="">
		Adresse de l'appartement : <input type="text" name="Adresse"> </br>
		Ville de l'appartement : <input type="text" name="Ville"> </br>
		Description de l'appartement : <input type="text" name="description"> </br>
		Prix/Jour : <input type="number" name="prixj"> </br>
		Prix/Saison : <input type="number" name="prixs"> </br>
		Id du Contrat : <input type="number" name="idContrat"> </br>
		<input type="submit" name="submit" value="Valider">

	</form>

	<?php

	if (isset($_POST['submit']))
	{

		$datede = $_POST['Adresse'];
		$dateded = $_POST['Ville'];
		$commentaire = $_POST['description'];
		$lieulivraison = $_POST['prixj'];
		$typeoper2 = $_POST['prixs'];
		$typeoper3 = $_POST['idContrat'];

		if ($datede&&$dateded&&$commentaire&&$lieulivraison&&$typeoper2&&$typeoper3)
			{


			// on se connecte à MySQL et on sélectionne la base
		$con = mysqli_connect("localhost","root","","GESTION_N_S");

	//On créé la requête
	$sql = "insert into appartements values (null,'".$datede."','".$dateded."','".$commentaire."','".$lieulivraison."','".$typeoper2."','".$typeoper3."');";

	// On envoie la requête
	$resultats= mysqli_query($con, $sql);
		// on ferme la connexion
	 mysqli_close($con);
	 echo "L'appartement a bien été ajouté";
 }else{
		 echo "Erreur lors de l'ajout";
	 }

	}
	break;
				case 3 :
				$mesObjets= selectReserv();
					echo "
					<table border=1>
					<tr><td> Numéro de reservation </td><td>Temps</td>
					<td> Duree</td> <td> Prix en euros</td>
					<td> Date Debut </td> <td> Date Fin </td><td> Numero Appartement </td><td> Reservant </td></tr>
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
						<td>".$uneLigne['idUtili']."</td>
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
					case 4 :
						//appel de la fonction
						$lesLignes=selectContratV();
						//var_dump($lesLignes);

						echo "
						<table border=1>
						<tr><td> Numéro du contrat </td><td>Prix du Logement par Jour </td><td>Prix du Logement par Saison </td><td>Date debut </td>
						<td> Date fin</td><td> Numéro utilisateur </td>
						<td>Adresse</td><td>Ville</td><td> Description</td></tr>
						";
						//parcourir les lignes et les afficher dans la table
						foreach ($lesLignes as $uneLigne) {
							echo "<tr><td>".$uneLigne['idContratGestV']."</td>
							<td>".$uneLigne['prixgestcontratJ']."</td>
							<td>".$uneLigne['prixgestionS']."</td>
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
					$lesLignes=selectAllUtili();
					//var_dump($lesLignes);
					echo "
					<table border=1>
	    		<tr><td> Numéro d'utilisateur </td><td>Pseudo </td><td>Mot de passe </td><td>Nom </td>
	    		<td> Prénom</td>
	    		<td> Adresse postale </td></tr>
	    		";
	    		//parcourir les lignes et les afficher dans la table
	    		foreach ($lesLignes as $uneLigne) {
	    			echo "<tr><td>".$uneLigne['idUtili']."</td>
	    			<td>".$uneLigne['pseudonyme']."</td>
						<td>".$uneLigne['mdpasse']."</td>
	    			<td>".$uneLigne['nomUtili']."</td>
	    			<td>".$uneLigne['prenomUtili']."</td>
	    			<td>".$uneLigne['codepostUtili'].", ".$uneLigne['adresseUtili']."</td>
	    			</tr>";
	    		}
	    		echo "</table>";

					break;
							case 8:
				    		//appel de la fonction
				    		$lesLignes=selectContratsGest();
				    		//var_dump($lesLignes);

								echo "
				    		<table border=1>
				    		<tr><td> Numéro du contrat </td><td>Prix du Logement par Jour </td><td>Prix du Logement par Saison </td><td>Date debut </td>
				    		<td> Date fin</td><td> Numéro utilisateur </td>
				    		<td>Adresse</td><td>Ville</td><td> Description</td></tr>
				    		";
				    		//parcourir les lignes et les afficher dans la table
				    		foreach ($lesLignes as $uneLigne) {
				    			echo "<tr><td>".$uneLigne['idContratGest']."</td>
				    			<td>".$uneLigne['prixgestcontratJ']."</td>
									<td>".$uneLigne['prixgestionS']."</td>
				    			<td>".$uneLigne['DateDebut']."</td>
				    			<td>".$uneLigne['DateFin']."</td>
									<td>".$uneLigne['idUtili']."</td>
									<td>".$uneLigne['Adresse']."</td>
									<td>".$uneLigne['ville']."</td>
									<td>".$uneLigne['description']."</td>
				    			</tr>";
				    		}
				    		echo "</table>";
							?>
							<br/>
							<form method="post" action="">
								Id du contrat à valider : <input type="number" name="idContratGest"> </br>
								<input type="submit" name="submit" value="Valider">

							</form>

							<?php

							if (isset($_POST['submit']))
							{

								$datede = $_POST['idContratGest'];

								if ($datede)
									{


									// on se connecte à MySQL et on sélectionne la base
								$con = mysqli_connect("localhost","root","","GESTION_N_S");

							//On créé la requête
							$sql = "insert into ContratV select*from ContratGestion where idContratGest=".$datede." ; delete from ContratGestion where idContratGest =".$datede." ;";

							// On envoie la requête
							$resultats= mysqli_query($con, $sql);
								// on ferme la connexion
							 mysqli_close($con);
							 echo $sql;
							 "Le contrat a été pré-ajouté avec succès !</br>";
							 "Rendez-vous à l'agence pour confirmer la réalisation du contrat</br>";
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
