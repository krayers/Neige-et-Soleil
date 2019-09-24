
<html>
	<head>
		<title>Accueil</title>
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
<a class="nav-link active nav-item" href="index.php">Accueil</a>
<a class="nav-link nav-item" href="connexion.php">Connexion</a>
<a class="nav-link nav-item" href="contact.php">Contact</a>
<a class="nav-link nav-item" href="news.php">News</a>
</nav>

		<div id="banner2">
		</div>

		<div id="contenuprincipal">
		<center>	<h2>Qui sommes nous ?</h2></center>
			<p>Neige et Soleil est une entreprise implantée dans la vallée du Queyras près de Briançon,
				l’activité principale de la société est la location d’appartements à la montagne et a pour
				 seconde activité la location de matériels de montagne pour le ski et la randonnée. </p>
				 <center><h3>Voici quelques uns de nos chalets et appartements : </h3>
				 <div class="w3-content w3-display-container">
					 <div class="w3-display-container mySlides">
			  <img src="location-chalet-pas-cher.jpg" style="width:100%">
			  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
			    Chalet 3 chambres, Vallée de Cherubin
			  </div>
			</div>
			<div class="w3-display-container mySlides">
	 <img src="-2.jpg" style="width:100%">
	 <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
		 Chalet 2 chambres, Vallée du Queyras
	 </div>
 </div>
 <div class="w3-display-container mySlides">
<img src="-1.jpg" style="width:100%">
<div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
Chalet 1 chambre, entre la Vallée du Queyras et de Cherubin
</div>
</div>

	   <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
	   <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
	 </div>
</center>
	 <script>
	 var slideIndex = 1;
	 showDivs(slideIndex);

	 function plusDivs(n) {
	   showDivs(slideIndex += n);
	 }

	 function showDivs(n) {
	   var i;
	   var x = document.getElementsByClassName("mySlides");
	   if (n > x.length) {slideIndex = 1}
	   if (n < 1) {slideIndex = x.length}
	   for (i = 0; i < x.length; i++) {
	     x[i].style.display = "none";
	   }
	   x[slideIndex-1].style.display = "block";
	 }
	 </script>

		</div>

		<div id="footer">
			<p>Neige & Soleil | Tous droits réservés</p>
		</div>
	</body>
</html>
