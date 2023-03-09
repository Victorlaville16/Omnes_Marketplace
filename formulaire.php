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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Création de Compte</title>
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
<body>
	<?php include_once('fonctions.php'); ?>
	
	<div class="container">

			<h1>Création de Compte</h1>

	<form action="creationUtilisateur.php" method="post">
			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" class="form-control" required>

			<label for="nom">Nom</label>
			<input type="text"  name="nom" class="form-control" required>

			<label for="identifiant">Identifiant</label>
			<input type="text" name="identifiant" class="form-control" required>

			<label for="password">Mot de Passe</label>
			<input type="text"  name="password" class="form-control" required>

			<label for="mail">Email</label>
			<input type="text"  name="mail" class="form-control" required>


				<td>Type de compte</td>
				<td><select name="type">
			        <option selected value=3>Acheteur</option>
			        <option value=2>Vendeur</option>
      				</select>
				</td>
			
			<button type="submit" name="submit" class="btn">Créer</button>
	</form>

</body>
</html>
