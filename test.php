<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<p>Page de test</p>
	
	<?php
		echo "Votre id : " .$_SESSION['id'];
		//session_destroy(); 
		
	?>
	 <button><a href="Accueil.php" <?php session_destroy();?>><big>Deconnexion</a></button>
</body>

</html>