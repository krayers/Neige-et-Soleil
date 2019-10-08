
<html>
	<head>
		<title>Accueil</title>
		<link href="style.css" rel="stylesheet">
		<link href="bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div id="banner1">
			<div id="logo">
				<img src="soleil.png" alt="" />
			</div>
		</div>
		<nav class="nav nav-pills nav-fill">
<a class="nav-link active nav-item" href="index.php">Accueil</a>
<a class="nav-link nav-item" href="connexion.php">Espace Membre</a>
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
					 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="location-chalet-pas-cher.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="-2.jpg" alt="Chicago" style="width:100%;">
      </div>

      <div class="item">
        <img src="-1.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
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
