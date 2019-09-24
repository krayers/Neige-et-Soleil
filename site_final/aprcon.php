
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
				<li><a href="index.php">Accueil</a></li>
				<li><a href="connexion.php">Connexion</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="profil.php">Profil</a></li>
			</ul>
			</div>

			<div id="banner2">
			</div>

			<div id="contenuprincipal">
			<p><form id='login' action='garage.php' method='post' accept-charset='UTF-8'>
			<fieldset >
			<legend>Pseudo</legend>
			<input type='hidden' name='submitted' id='submitted' value='1'/>

			<label for='pseudo' >Pseudo:</label>
			<input type='text' name='pseudo' id='pseudo'  maxlength="50" />

			<label for='mdp' >Mot de passe:</label>
			<input type='password' name='mdp' id='mdp' maxlength="50" />

			<input type='submit' name='SeConnecter' value='Connexion' />

			</fieldset>
			</form>
			<?php
			require_once ("fonctions.php");
			session_start(); //demarrage session
			if (isset($_POST['SeConnecter']))
			{
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$resultat = verif_connexion ($pseudo, $mdp);
			//var_dump($resultat);
			if ($resultat == null) {
			echo "<br/> Veuillez vérifier vos identifiants";
			} else {
			echo "<br/> Bienvenue ".$resultat["nom"]." ".$resultat["prenom"];


			$_SESSION['pseudo']=$resultat['pseudo'];
			$_SESSION['idemploye']=$resultat['idemploye'];
			}
			}
			if(isset($_SESSION['idemploye']))
			{
			?>
			<div id="nav">
			<h2>Navigation</h2>
			<ul>
				<?php
			echo "<br/> <a href='garage.php?page=1'> Liste des commandes </a>";
			echo "<br/> <a href='garage.php?page=10'> Liste de toutes les pieces </a>";
			echo "<br/> <a href='garage.php?page=13'>Liste des employés</a>";
			echo "<br/> <a href='ajoutobjet.php'> Enregistrement d'un client </a>";
			echo "<br/> <a href='ajoutpiece.php'> Enregistrement de pieces </a>";
			echo "<br/> <a href='garage.php?page=3'> Voir mes voitures </a>";
			echo "<br/> <a href='garage.php?page=9'>Fin commande</a>";
			echo "<br/> <a href='garage.php?page=12'>Enregistrement retrait de piece</a>";
			echo "<br/> <a href='garage.php?page=11'> Se Déconnecter</a>";

			?></ul>
			</div>
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
						$lesLignes=selectUtilisateur($_SESSION['idUtili']);
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
							<td>".$uneLigne['nomUtili']."</td>
							<td>".$uneLigne['prenomUtili']."</td>
							<td>".$uneLigne['codepostUtili'].", ".$uneLigne['adresseUtili']."</td>
							</tr>";
						}
						echo "</table>";
						break;
						case 3 :
						$mesObjets= selectReservUtili($_SESSION['idUtili']);
							echo "
							<table border=1>
							<tr><td> Numéro de reservation </td><td>Prix de la location</td>
							<td> Début de la location</td> <td> Fin de la location</td>
							<td> Numéro de l'appartement </td> </tr>
							";
							//parcourir les lignes et les afficher dans la table
							foreach ($mesObjets as $uneLigne) {
								echo "<tr><td>".$uneLigne['idContratLoc']."</td>
								<td>".$uneLigne['PrixLoc']."</td>
								<td>".$uneLigne['DateDebut']."</td>
								<td>".$uneLigne['DateFin']."</td>
								<td>".$uneLigne['idAppart']."</td>
								</tr>";
							}
							echo "</table>";
							break;
							case 4 :
							//appel de la fonction
							$lesLignes=selectAllObjetsVente();
							//var_dump($lesLignes);
							echo "
							<table border=1>
							<tr><td> Numéro d'appartement</td><td>Adresse</td>
							<td> Ville</td> <td> Etage</td>
							<td> Palier </td> <td> Description </td></tr>
							";
							//parcourir les lignes et les afficher dans la table
							foreach ($lesLignes as $uneLigne) {
								echo "<tr><td>".$uneLigne['idAppart']."</td>
								<td>".$uneLigne['Adresse']."</td>
								<td>".$uneLigne['ville']."</td>
								<td>".$uneLigne['Etage']."</td>
								<td>".$uneLigne['Palier']."</td>
								<td>".$uneLigne['description']."</td>
								</tr>";
							}
							echo "</table>";
							break;
							case 5 :
									?>
									<form method="post" action="">
										Adresse : <input type="text" name="Adresse"> </br>
										Ville : <input type="text" name="ville"> </br>
										Description : <input type="text" name="description"> </br>
										Etage : <input type="text" name="Etage"> </br>
										Palier : <input type="text" name="Palier"> </br>
											<input type="submit" name="submit" value="Valider">

									</form>

									<?php

									if (isset($_POST['submit']))
									{

										$datede = $_POST['Adresse'];
										$commentaire = $_POST['ville'];
										$lieulivraison = $_POST['Etage'];
										$typeoper = $_POST['Palier'];
										$idobjet = $_POST['description'];

										if ($datede&&$commentaire&&$idobjet&&$typeoper&&$lieulivraison)
											{


											// on se connecte à MySQL et on sélectionne la base
										$con = mysqli_connect("localhost","root","","GESTION_N_S");

									//On créé la requête
									$sql = "insert into appartements values (null,'".$datede."','".$commentaire."','".$idobjet."','".$typeoper."','".$lieulivraison."');";

									// On envoie la requête
									$resultats= mysqli_query($con, $sql);
										// on ferme la connexion
										mysqli_close($con);
										echo "L'appartement a été ajouté avec succès !";

									}else echo "Veuillez saisir tous les champs !";

								}
									break;
									case 8 :
									?>
									<form method="post" action="">
										Prix du contrat : <input type="text" name="PrixGestContrat"> </br>
										Date fin contrat : <input type="date" name="DateDebut"> </br>
										Date fin contrat : <input type="date" name="DateFin"> </br>
										Numéro appartement : <input type="number" name="idAppart"> </br>
										Identifiant propriétaire : <input type="number" name="idUtili"> </br>
										<input type="submit" name="submit" value="Valider">

									</form>

									<?php

									if (isset($_POST['submit']))
									{

										$datede = $_POST['PrixGestContrat'];
										$commentaire = $_POST['DateDebut'];
										$lieulivraison = $_POST['DateFin'];
										$typeoper = $_POST['idAppart'];

										if ($datede&&$commentaire&&$lieulivraison&&$typeoper)
											{


											// on se connecte à MySQL et on sélectionne la base
										$con = mysqli_connect("localhost","root","","GESTION_N_S");

									//On créé la requête
									$sql = "insert into ContratGestion values (null,'".$datede."','".$commentaire."','".$lieulivraison."','".$typeoper."', ".$_SESSION['idUtili'].");";

									// On envoie la requête
									$resultats= mysqli_query($con, $sql);
										// on ferme la connexion
									 mysqli_close($con);
									 echo "Le contrat a été pré-ajouté avec succès !</br>";
									 echo "Rendez-vous à l'agence pour confirmer la réalisation du contrat</br>";
								 }else echo "Veuillez saisir tous les champs !";

							 }
									break;
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

									$nom = $_POST['nomUtili'];
									$prenom = $_POST['prenomUtili'];
									$mdp = $_POST['mdpasse'];
									$adresse = $_POST['adresseUtili'];
									$codepost = $_POST['codepostUtili'];
									$datenai = $_POST['DateNaissUtili'];




									$con = mysqli_connect("localhost","root","","gestion_n_s");

									$sql = "UPDATE Utilisateurs SET nomUtili='".$nom."' where nomUtili=".$_SESSION['nomUtili'].",
									prenomUtili='".$prenom."' where prenomUtili=".$_SESSION['prenomUtili'].",
									mdpasse='".$mdp."' where mdpasse=".$_SESSION['mdpasse']." ,
									adresseUtili='".$adresse."' where adresseUtili=".$_SESSION['adresse'].",
									codepostUtili='".$codepost."' where codepostUtili=".$_SESSION['codepostUtili'].",
									DateNaissUtili='".$datenai."' where DateNaissUtili=".$_SESSION['DateNaissUtili']."; ";

									$resultats= mysqli_query($con, $sql);
									mysqli_close($con);
									echo "La modification a été réalisée avec succès";




									}
											break;
											case 7 :
											//appel de la fonction
										$lesLignes=selectAllObjetsEchange($_SESSION['idUtili']);
										//var_dump($lesLignes);
										echo "
										<table border=1>
										<tr><td> Numéro contrat </td><td>Prix contrat</td>
										<td> Date début</td> Date fin<td> Date Fin </td>
										<td> Numéro appartement </td><td> id Proprietaire </td></tr>
										";
										//parcourir les lignes et les afficher dans la table
										foreach ($lesLignes as $uneLigne) {
											echo "<tr><td>".$uneLigne['idContratGest']."</td>
											<td>".$uneLigne['PrixGestContrat']."</td>
											<td>".$uneLigne['DateDebut']."</td>
											<td>".$uneLigne['DateFin']."</td>
											<td>".$uneLigne['idUtili']."</td>
											<td>".$uneLigne['idAppart']."</td>
											</tr>";
										}
										echo "</table>";
										break;
										case 9 :
										session_start();

										// Suppression des variables de session et de la session
										$_SESSION = array();
										session_destroy();

										// Suppression des cookies de connexion automatique
										setcookie('login', '');
										setcookie('pass_hache', '');


										header('Location: index.php');



								}
							}
							?>
				</div>

				<div id="footer">
					<p>Neige & Soleil | Tous droits réservés</p>
				</div>
			</body>
		</html>
