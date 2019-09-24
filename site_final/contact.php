
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
      <center><h1>Comment nous contacter ?</h1></center>
		</br><h3><strong>Par téléphone :</strong></h3>
      <p> - 09 56 48 38 90 (appel non surtaxé) </br>
        - Ouvert du lundi au samedi de 9h à 19h </br>
        - Dimanche : 9h à 18h
			</br></br><h3><strong>Par message :</strong></h3>
  
			<form name="contactform" method="post" action="envoie.php">
<table width="450px">
<tr>
<td valign="top">
<label for="prenom">Prénom</label>
</td>
<td valign="top">
<input  type="text" name="prenom" maxlength="50" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="nom">Nom</label>
</td>
<td valign="top">
<input  type="text" name="nom" maxlength="50" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="email">Adresse mail</label>
</td>
<td valign="top">
<input  type="text" name="email" maxlength="80" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="tel">Telephone</label>
</td>
<td valign="top">
<input  type="text" name="tel" maxlength="30" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="msg">Message</label>
</td>
<td valign="top">
<textarea  name="msg" maxlength="1000" cols="25" rows="6"></textarea>
</td>
</tr>
<tr>
<td colspan="2" style="text-align:center">
<input type="submit" value="Valider"></a>
</td>
</tr>
</table>
</form>


</div>
		</div>

		<div id="footer">
			<p>Neige & Soleil | Tous droits réservés</p>
		</div>
	</body>
</html>
