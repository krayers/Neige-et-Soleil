<?php
	require_once ("fonctions.php");
		session_start(); //demarrage session
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset ="utf-8">
</head>
<body>
	<center>
	<div id="container">
		<div id="header">
	<h1> Connexion Neige & Soleil </h1>
	<form method ="post" action ="">
	Pseudo : <input type ="text" name="pseudonyme"> </br>
	MDP : <input type ="password" name="mdpasse"> </br>
	<input type ="reset" name ="Annuler" value ="Annuler">
	<input type ="submit" name ="SeConnecter" value ="Se Connecter"><br/>
	<a href="inscription.php"> Créer un compte </a> </br>
	</form>
</div>
	<?php
		if (isset($_POST['SeConnecter']))
		{
			$pseudo = $_POST['pseudonyme'];
			$mdp = $_POST['mdpasse'];
			$resultat = verif_connexion ($pseudo, $mdp);
			//var_dump($resultat);
			if ($resultat == null) {
				echo "<br/> Veuillez vérifier vos identifiants";
			} else {
				echo "<br/> Bienvenue ".$resultat["nomUtili"]." ".$resultat["prenomUtili"];

				$_SESSION['pseudonyme']=$resultat['pseudonyme'];
				$_SESSION['idUtili']=$resultat['idUtili'];
			}
		}
		if(isset($_SESSION['idUtili']))
		{
			?>
			<div id="nav">
				<h2>Navigation</h2>
				<ul>
					<?php
		echo "<br/> <a href='index.php?page=1'> Mon Compte </a>";
		echo "<br/> <a href='index.php?page=2'> Mes reservations </a>";
		echo "<br/> <a href='index.php?page=3'> Mes appartements </a>";
		echo "<br/> <a href='index.php?page=9'> Se Déconnecter</a>";
		?>
	</ul>
	 </div>
 </div>
		<?php
		if (isset($_GET['page'])) {
			$page=$_GET['page'];
		}else {
			$page= 0;
		}
		switch ($page) {
			case 1 :
				//appel de la fonction
				$lesLignes=selectUtilisateur();
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
				case 2 :
				$mesObjets= selectReservUtili($_SESSION['idUtili']);
				echo "
				<table border=1>
				<tr><td> Numéro de reservation </td><td>Prix de la location</td>
					<td> Début de la location</td> <td> Fin de la location</td>
				<td> Numéro de l'appartement </td> </tr>
				";
				//parcourir les lignes et les afficher dans la table
				foreach ($mesObjets as $uneLigne) {
					echo "<tr><td>".$uneLigne['idobjet']."</td>
					<td>".$uneLigne['designation']."</td>
					<td>".$uneLigne['etat']."</td>
					<td>".$uneLigne['prixachat']."</td>
					<td>".$uneLigne['dateachat']."</td>
					<td>".$uneLigne['marque']."</td>
					<td>".$uneLigne['trancheage']."</td>
					<td>".$uneLigne['image']."</td>
					</tr>";
				}
				echo "</table>";
				break;
				case 3 :
					//appel de la fonction
					$lesLignes=selectAllObjetsVente();
					//var_dump($lesLignes);
					echo "
					<table border=1>
					<tr><td> id vente</td><td>Date vente</td>
					<td> Prix vente</td> <td> Lieu livraison</td>
					<td> Paiement </td> <td> Commentaire </td></tr>
					";
					//parcourir les lignes et les afficher dans la table
					foreach ($lesLignes as $uneLigne) {
						echo "<tr><td>".$uneLigne['idvente']."</td>
						<td>".$uneLigne['datevente']."</td>
						<td>".$uneLigne['prixvente']."</td>
						<td>".$uneLigne['lieulivraison']."</td>
						<td>".$uneLigne['payement']."</td>
						<td>".$uneLigne['commentaire']."</td>
						</tr>";
					}
					echo "</table>";
					break;
					case 4 :
						//appel de la fonction
						$lesLignes=selectAllObjetsDon();
						//var_dump($lesLignes);
						echo "
						<table border=1>
						<tr><td> id de </td><td>Date Don</td>
						<td> Commentaire</td> <td> Lieu livraison</td>
						<td> Type operation </td></tr>
						";
						//parcourir les lignes et les afficher dans la table
						foreach ($lesLignes as $uneLigne) {
							echo "<tr><td>".$uneLigne['idde']."</td>
							<td>".$uneLigne['datede']."</td>
							<td>".$uneLigne['commentaire']."</td>
							<td>".$uneLigne['lieulivraison']."</td>
							<td>".$uneLigne['typeoperation']."</td>
							</tr>";
						}
						echo "</table>";
						break;
						case 5 :
							//appel de la fonction
							$lesLignes=selectAllObjetsEchange();
							//var_dump($lesLignes);
							echo "
							<table border=1>
							<tr><td> id de </td><td>Date Echange</td>
							<td> Commentaire</td> <td> Lieu livraison</td>
							<td> Type operation </td></tr>
							";
							//parcourir les lignes et les afficher dans la table
							foreach ($lesLignes as $uneLigne) {
								echo "<tr><td>".$uneLigne['idde']."</td>
								<td>".$uneLigne['datede']."</td>
								<td>".$uneLigne['commentaire']."</td>
								<td>".$uneLigne['lieulivraison']."</td>
								<td>".$uneLigne['typeoperation']."</td>
								</tr>";
							}
							echo "</table>";
							break;
							case 6 :
							?>
							<form method="post" action="">
					      Date du don/échange : <input type="text" name="datede"> </br>
					      Commentaire : <input type="text" name="commentair"> </br>
					      Lieu de livraison : <input type="text" name="lieulivraison"> </br>
					      Type d'opération : <input type="radio" name="typeoper" value="don" checked> Don <input type="radio" name="typeoper" value="echange"> Echange </br>
								Id Objet : <input type="text" name="idobjet"> </br>
					        <input type="submit" name="submit" value="Valider">

					    </form>

					<?php

					if (isset($_POST['submit']))
					{

					$datede = $_POST['datede'];
					$commentaire = $_POST['commentair'];
					$lieulivraison = $_POST['lieulivraison'];
					$typeoper = $_POST['typeoper'];
					$idobjet = $_POST['idobjet'];

					if ($datede&&$commentaire&&$lieulivraison&&$typeoper&&$idobjet)
					        {


					 // on se connecte à MySQL et on sélectionne la base
					  $con = mysqli_connect("localhost","root","","troc");

					 //On créé la requête
					$sql = "insert into donEchange values (null,'".$datede."','".$commentaire."','".$lieulivraison."','".$typeoper."','".$idobjet."', ".$_SESSION['idenfant'].");";

					    // On envoie la requête
					$resultats= mysqli_query($con, $sql);
					       // on ferme la connexion
					mysqli_close($con);
					echo "L'objet a été ajouté avec succès !";

					}else echo "Veuillez saisir tous les champs !";

					}
							break;
							case 6 :
							?>
							<form method="post" action="">
					      Date du don/échange : <input type="text" name="datede"> </br>
					      Commentaire : <input type="text" name="commentair"> </br>
					      Lieu de livraison : <input type="text" name="lieulivraison"> </br>
					      Type d'opération : <input type="radio" name="typeoper" value="don" checked> Don <input type="radio" name="typeoper" value="echange"> Echange </br>
								Id Objet : <input type="text" name="idobjet"> </br>
					        <input type="submit" name="submit" value="Valider">

					    </form>

					<?php

					if (isset($_POST['submit']))
					{

					$datede = $_POST['datede'];
					$commentaire = $_POST['commentair'];
					$lieulivraison = $_POST['lieulivraison'];
					$typeoper = $_POST['typeoper'];
					$idobjet = $_POST['idobjet'];

					if ($datede&&$commentaire&&$lieulivraison&&$typeoper&&$idobjet)
					        {


					 // on se connecte à MySQL et on sélectionne la base
					  $con = mysqli_connect("localhost","root","","troc");

					 //On créé la requête
					$sql = "insert into donEchange values (null,'".$datede."','".$commentaire."','".$lieulivraison."','".$typeoper."','".$idobjet."', ".$_SESSION['idenfant'].");";

					    // On envoie la requête
					$resultats= mysqli_query($con, $sql);
					       // on ferme la connexion
					mysqli_close($con);
					echo "L'objet a été ajouté avec succès !";

					}else echo "Veuillez saisir tous les champs !";

					}
							break;case 6 :
							?>
							<form method="post" action="">
					      Date du don/échange : <input type="text" name="datede"> </br>
					      Commentaire : <input type="text" name="commentair"> </br>
					      Lieu de livraison : <input type="text" name="lieulivraison"> </br>
					      Type d'opération : <input type="radio" name="typeoper" value="don" checked> Don <input type="radio" name="typeoper" value="echange"> Echange </br>
								Id Objet : <input type="text" name="idobjet"> </br>
					        <input type="submit" name="submit" value="Valider">

					    </form>

					<?php

					if (isset($_POST['submit']))
					{

					$datede = $_POST['datede'];
					$commentaire = $_POST['commentair'];
					$lieulivraison = $_POST['lieulivraison'];
					$typeoper = $_POST['typeoper'];
					$idobjet = $_POST['idobjet'];

					if ($datede&&$commentaire&&$lieulivraison&&$typeoper&&$idobjet)
					        {


					 // on se connecte à MySQL et on sélectionne la base
					  $con = mysqli_connect("localhost","root","","troc");

					 //On créé la requête
					$sql = "insert into donEchange values (null,'".$datede."','".$commentaire."','".$lieulivraison."','".$typeoper."','".$idobjet."', ".$_SESSION['idenfant'].");";

					    // On envoie la requête
					$resultats= mysqli_query($con, $sql);
					       // on ferme la connexion
					mysqli_close($con);
					echo "L'objet a été ajouté avec succès !";

					}else echo "Veuillez saisir tous les champs !";

					}
							break;
							case 6 :
							?>
							<form method="post" action="">
					      Date du don/échange : <input type="text" name="datede"> </br>
					      Commentaire : <input type="text" name="commentair"> </br>
					      Lieu de livraison : <input type="text" name="lieulivraison"> </br>
					      Type d'opération : <input type="radio" name="typeoper" value="don" checked> Don <input type="radio" name="typeoper" value="echange"> Echange </br>
								Id Objet : <input type="text" name="idobjet"> </br>
					        <input type="submit" name="submit" value="Valider">

					    </form>

					<?php

					if (isset($_POST['submit']))
					{

					$datede = $_POST['datede'];
					$commentaire = $_POST['commentair'];
					$lieulivraison = $_POST['lieulivraison'];
					$typeoper = $_POST['typeoper'];
					$idobjet = $_POST['idobjet'];

					if ($datede&&$commentaire&&$lieulivraison&&$typeoper&&$idobjet)
					        {


					 // on se connecte à MySQL et on sélectionne la base
					  $con = mysqli_connect("localhost","root","","troc");

					 //On créé la requête
					$sql = "insert into donEchange values (null,'".$datede."','".$commentaire."','".$lieulivraison."','".$typeoper."','".$idobjet."', ".$_SESSION['idenfant'].");";

					    // On envoie la requête
					$resultats= mysqli_query($con, $sql);
					       // on ferme la connexion
					mysqli_close($con);
					echo "L'objet a été ajouté avec succès !";

					}else echo "Veuillez saisir tous les champs !";

					}
							break;

					case 7 :
							?>
							<form method="post" action="">
					      Date de la vente : <input type="text" name="dateve"> </br>
					      Prix de Vente : <input type="text" name="prixv"> </br>
					      Lieu de livraison : <input type="text" name="lieulivraison"> </br>
					      Paiement : <input type="text" name="paie"> </br>
								Description de l'objet : <input type="text" name="Commentaire"> </br>
								Numéro de l'objet dans votre inventaire : <input type="text" name="idobjett"> </br>

					        <input type="submit" name="submit" value="Valider">

					    </form>

					<?php

					if (isset($_POST['submit']))
					{

					$datede = $_POST['dateve'];
					$commentaire = $_POST['prixv'];
					$lieulivraison = $_POST['lieulivraison'];
					$typeoper = $_POST['paie'];
					$idobjet = $_POST['Commentaire'];
					$idobjett = $_POST['idobjett'];

					if ($datede&&$commentaire&&$lieulivraison&&$typeoper&&$idobjet&&$idobjett)
					        {


					 // on se connecte à MySQL et on sélectionne la base
					  $con = mysqli_connect("localhost","root","","troc");

					 //On créé la requête
					$sql = "insert into vente values (null,'".$datede."','".$commentaire."','".$lieulivraison."','".$typeoper."','".$idobjet."',".$idobjett.",".$_SESSION['idenfant'].");";

					    // On envoie la requête
					$resultats= mysqli_query($con, $sql);
					       // on ferme la connexion
					mysqli_close($con);
					echo "Votre objet a bien été mis en vente !";

					}else echo "Veuillez saisir tous les champs !";

					}
							break;
							case 9 :
							session_start();

$_SESSION = array();
session_destroy();
header('Location: index.php?page=0');
								break;

		}
	}
	?>
</center>
	</body>
	</html>
