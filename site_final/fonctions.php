<?php

	function connexion ()
	{
			$con = mysqli_connect("localhost","root","","GESTION_N_S");
			if ($con == null)
			{
					echo "Erreur de connexion au serveur localhost";
				return null;
			}
			else
		{
				mysqli_set_charset($con, "utf8");
				return $con;
			}
	}
	function deconnexion ($con)
	{
		if ($con != null ) { mysqli_close($con); }
	}
	function verif_connexion ($pseudo, $mdp)
	{
		$requete = "select * from Utilisateurs where pseudonyme ='".$pseudo."' and mdpasse ='".$mdp."';";
		$con = connexion ();
		if ($con==null) {
			return null;
		}
		else
		{
			$resultat = mysqli_query($con, $requete);
			$ligne = mysqli_fetch_assoc($resultat);
			return $ligne;
		}
		deconnexion($con);
	}
	function selectUtilisateur($idUtili)
	{
		$requete="select * from Utilisateurs where idUtili = ".$idUtili.";";
		$con=connexion();
		if($con==null)
		{
			return null;
		}
		else {
			//execution de la requete et recupérer les tuples
			$resultats= mysqli_query($con, $requete);
			//déclaration d'un tableau vide
			$lesLignes= array();
			//parcours des resultats et leur insertion dans le tableau lesLignes
			while ($ligne = mysqli_fetch_assoc($resultats))
			{
				$lesLignes[]=$ligne;
			}
			return $lesLignes;
		}
	}
	function selectReservUtili($idUtili)
	{
		$requete="select * from Reservation where idUtili = ".$idUtili.";";
		$con=connexion();
		if($con==null)
		{
			return null;
		}
		else {
			//execution de la requete et recupérer les tuples
			$resultats= mysqli_query($con, $requete);
			//déclaration d'un tableau vide
			$lesLignes= array();
			//parcours des resultats et leur insertion dans le tableau lesLignes
			while ($ligne = mysqli_fetch_assoc($resultats))
			{
				$lesLignes[]=$ligne;
			}
			return $lesLignes;
		}
	}
	function selectAllObjetsVente()
	{
		$requete="select * from appartements ;";
		$con=connexion();
		if($con==null)
		{
			return null;
		}
		else {
			//execution de la requete et recupérer les tuples
			$resultats= mysqli_query($con, $requete);
			//déclaration d'un tableau vide
			$lesLignes= array();
			//parcours des resultats et leur insertion dans le tableau lesLignes
			while ($ligne = mysqli_fetch_assoc($resultats))
			{
				$lesLignes[]=$ligne;
			}
			return $lesLignes;
		}
	}
	function selectAllObjetsDon()
	{
		$requete="select*from donechange
		 where typeoperation='don';";
		$con=connexion();
		if($con==null)
		{
			return null;
		}
		else {
			//execution de la requete et recupérer les tuples
			$resultats= mysqli_query($con, $requete);
			//déclaration d'un tableau vide
			$lesLignes= array();
			//parcours des resultats et leur insertion dans le tableau lesLignes
			while ($ligne = mysqli_fetch_assoc($resultats))
			{
				$lesLignes[]=$ligne;
			}
			return $lesLignes;
		}
	}

	function selectContratsGest($idUtili)
	{
		$requete="select * from ContratGestion where idUtili = ".$idUtili.";";
		$con=connexion();
		if($con==null)
		{
			return null;
		}
		else {
			//execution de la requete et recupérer les tuples
			$resultats= mysqli_query($con, $requete);
			//déclaration d'un tableau vide
			$lesLignes= array();
			//parcours des resultats et leur insertion dans le tableau lesLignes
			while ($ligne = mysqli_fetch_assoc($resultats))
			{
				$lesLignes[]=$ligne;
			}
			return $lesLignes;
		}
	}
	function Echange()
	{


	}
	function Don()
	{


	}
	function Vente()
	{


	}
	?>
