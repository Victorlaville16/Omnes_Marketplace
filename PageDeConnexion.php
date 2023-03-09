<?php session_start();
if (isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    // Afficher le message à l'utilisateur
	?>
	<script type="text/javascript">
	alert('<?php echo $message?>');
	</script>
	<?php
    // Supprimer le cookie
    setcookie('message', '', time() - 3600, '/');
} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Page de Connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.container {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0,0,0,0.3);
			margin: 50px auto;
			padding: 20px;
			max-width: 400px;
			width: 100%;
		}

		.container h1 {
			text-align: center;
		}

		.form-control {
			background-color: #f9f9f9;
			border: none;
			border-radius: 3px;
			box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
			color: #333;
			display: block;
			margin: 10px 0;
			padding: 10px;
			width: 95%;
		}

		.btn {
			background-color: #00C2CB;
			border: none;
			border-radius: 3px;
			color: #fff;
			cursor: pointer;
			display: block;
			margin: 10px 0;
			padding: 10px;
			width: 100%;
		}

		.btn:hover {
			background-color: #0e00cb;
		}

		.link {
			color: #666;
			display: block;
			margin: 10px 0;
			text-align: center;
			text-decoration: none;
		}

		.link:hover {
			color: #333;
		}

	</style>
</head>
<body >
	<?php 
	 if(isset($_SESSION['id'])){
		echo $_SESSION['id'];
	 }

	?>

	<div class="container">

		<h1>Connexion</h1>

		<form action="connexionUtilisateur.php" method="post">

			<label for="email">Identifiant</label>
			<input type="text" id="email" name="identifiant" class="form-control" required>

			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" class="form-control" required>

			<button type="submit" class="btn">Se connecter</button>

			<a href="formulaire.php" class="link">Créer un compte</a>

		</form>

	</div>

</body>
</html>