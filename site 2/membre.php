<?php
session_start();
if (!isset($_SESSION['pseudonyme'])) {
	header ('Location: index.php');
	exit();
}
?>

<html>
<head>
<title>Espace membre</title>
</head>

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['pseudonyme'])); ?> !<br />
<a href="deconnexion.php">Déconnexion</a>
</body>
</html>
