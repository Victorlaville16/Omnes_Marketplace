
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php include_once('fonctions.php'); 
		//$nom = recupNom('ben');
		//$prenom = recupPrenom('ben');
	?>

	<h3><?php //afficherPhotoProfil('ben'); ?></h3>
	<h3><?php //echo $nom ." ".$prenom; ?></h3>

	<form action="creationUtilisateur.php" method="post">
		<table border="1">
			<tr>
				<td>Prenom</td>
				<td><input type="text" name="prenom"></td>

			</tr>
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Identifiant</td>
				<td><input type="text" name="identifiant"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td>Type de compte</td>
				<td><select name="type">
			        <option name="selection">Selectionnez votre type de compte</option>
			        <option value=3>Acheteur</option>
			        <option value=2>Vendeur</option>
      				</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Valider">
				</td>
			</tr>

		</table>
	</form>

</body>
</html>