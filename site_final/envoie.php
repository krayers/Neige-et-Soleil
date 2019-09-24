<?php
if(isset($_POST['email'])) {

    $email_to = "wibrah@protonmail.com";
    $email_subject = "L'objet";

    function died($error) {
        echo "Désolé, des erreurs ont été detectées dans votre formulaire. ";
        echo ".<br /><br />";
        echo $error."<br /><br />";
        echo "Veuillez corriger ces erreurs.<br /><br />";
        die();
    }


    if(!isset($_POST['prenom']) ||
        !isset($_POST['nom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['tel']) ||
        !isset($_POST['msg'])) {
        died('Désolé, des erreurs ont été detectées dans votre formulaire.');
    }



    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $msg = $_POST['msg'];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= "l Adresse mail entrée est invalide.<br />";
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$prenom)) {
    $error_message .= 'Le prenom entré est invalide<br />';
  }

  if(!preg_match($string_exp,$nom)) {
    $error_message .= 'Le nom entré est invalide.<br />';
  }

  if(strlen($msg) < 2) {
    $error_message .= 'Le message est invalide.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }




    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

$email_message = "Form details below.\n\n";

    $email_message .= "Prenom: ".clean_string($prenom)."\n";
    $email_message .= "Nom: ".clean_string($nom)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telephone: ".clean_string($tel)."\n";
    $email_message .= "Message: ".clean_string($msg)."\n";

$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
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
      <center><h1>Comment nous contacter ?</h1></center>
		</br><h3><strong>Par téléphone :</strong></h3>
      <p> - 09 56 48 38 90 (appel non surtaxé) </br>
        - Ouvert du lundi au samedi de 9h à 19h </br>
        - Dimanche : 9h à 18h
      </br>
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

<center>Votre message a été envoyé avec succès !</center>

</div>
		</div>

		<div id="footer">
			<p>Neige & Soleil | Tous droits réservés</p>
		</div>
	</body>
</html>

<?php

}
?>
