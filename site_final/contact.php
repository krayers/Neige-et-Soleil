
<html>
	<head>
		<title>Contact</title>
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
<a class="nav-link nav-item" href="index.php">Accueil</a>
<a class="nav-link nav-item" href="connexion.php">Espace Membre</a>
<a class="nav-link active nav-item" href="contact.php">Contact</a>
<a class="nav-link nav-item" href="news.php">News</a>


</nav>


		<div id="banner2">
		</div>

		<div id="contenuprincipal">
      <center><h1>Comment nous contacter ?</h1>
		</br><h3><strong>Par téléphone :</strong></h3>
      <p> - 09 56 48 38 90 (appel non surtaxé) </br>
        - Ouvert du lundi au samedi de 9h à 19h </br>
        - Dimanche : 9h à 18h</center>

			<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">Contacts</span>
                </div>
                
                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <ul class="list-group" id="contact-list">
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="https://media.licdn.com/dms/image/C4D03AQEpSqy2XxbDwA/profile-displayphoto-shrink_200_200/0?e=1579737600&v=beta&t=ltddSPfaJZLauwbBd0dmaUUZJI7yibJley8vZCD_9so" alt="Brym Hugo" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Brym Hugo</span><br/>
                            <span class="telephone">06-72-32-17-96</span><br/>
                            <span class="emailA">hugo.brym@hotmail.com</span><br/>
                           
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="https://media.licdn.com/dms/image/C4D03AQE4LndxoBm3Zg/profile-displayphoto-shrink_200_200/0?e=1579737600&v=beta&t=bskr_E3lx8EwilqtnVQfwE7tc763hSZ_rVcypqC3fFA" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Ibrahim El Walid</span><br/>
                            <span class="telephone">06-69-59-70-00</span><br/>
                            <span class="emailA">wibrah@protonmail.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
               </div>
        </div>
    </div>
</ul>
</div>

    <div class="form-style-2">
<div class="form-style-2-heading">

<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])){

	$message='
		<html>
			<body>
				<div align="center">
					
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
					
				</div>
			</body>
		</html>
		';

		mail("hugo.brym@hotmail.com","http://localhost/Sio/SIO/PPE/site_final/contact.php", $message);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>

<center><h2>Contactez Nous</h2></center></div>
<form action="" method="post">

<center><label for="prenom"><span>Prénom <span class="required"></span></span><input type="text" name="prenom" placeholder="Votre prénom" value="<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>" /><br /><br /></label></br>

<label for="Nom"><span>Nom <span class="required"></span></span><input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
</label></br>

<label for="email"><span> Email <span class="required"></span></span><input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br /></label></br>

<label for="message"><span> Message <span class="required"></span></span><textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br /></label></br>


<label><span> </span><input type="submit" value="Envoyer !" name="mailform"/></label>
</center></form>
</div>

	<?php
  		
  		if(isset($msg))
		{
			echo $msg;
		}

	?>
    
   
    
</div>
</div>
</p>
</center>
</div>
</body>
</html>


