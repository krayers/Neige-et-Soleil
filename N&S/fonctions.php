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
?>
