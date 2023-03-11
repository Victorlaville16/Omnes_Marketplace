<?php
session_start();
include('fonctions.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Titre de votre page de vente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css" rel="stylesheet" type="text/css" />
	<!-- Ajoutez ici les liens vers vos feuilles de style CSS et fichiers JavaScript -->


</head>

<body>
	<header>
		<!-- Ajoutez ici votre en-tête, votre logo et vos menus de navigation -->
	</header>
	<main>
		<?php
		include('afficherCarrouselVehicule.php');
		// Récupérer la clé primaire de l'objet sélectionné
		$ID_vehicule = $_GET["id"];
		$ID_utilisateur = $_SESSION['ID_utilisateur'];
		$ID_acheteur = getIDAcheteur($ID_utilisateur);

		// Connexion à la base de données
		$dsn = "mysql:host=localhost;dbname=marketplace;charset=utf8mb4";

		$pdo = new PDO($dsn, "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Requête SQL pour récupérer les informations de l'objet
		$sql = "SELECT * FROM vehicules WHERE ID_vehicule = :ID_vehicule";

		// Préparer la requête
		$stmt = $pdo->prepare($sql);

		// Bind des valeurs des paramètres
		$stmt->bindParam(':ID_vehicule', $ID_vehicule, PDO::PARAM_INT);

		// Exécuter la requête
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			// Récupérer les informations de l'objet et les afficher
			$row = $stmt->fetch();
		} else {
			echo "Aucun objet trouvé avec cet ID.";
		}

		?>
		<section id="produit">

			<h1>Vente de <?php echo $row["nom"]; ?></h1>
			<?php afficherCarrouselVehicule($row['ID_vehicule'], $pdo) ?>
			<h2>Description de l'objet</h2>
			<p><?php echo $row["description"]; ?></p>
			<h2>Prix</h2>
			<p><?php echo $row["prix"]; ?> €</p>
			<button>Acheter maintenant</button>
			<a href="ToutParcourirAcheteur.php">Retour à la liste des objets</a>

		<!--	<button type="button" onclick="miseEnSelection()">Mettre dans votre sélection</button>-->

			<a href="ajouterEnSelection.php?ID_acheteur=<?php echo $ID_acheteur;?>&ID_vehicule=<?php echo $ID_vehicule;?>"><button type="submit" id="ajouterEnSelection">Mettre dans votre sélection</button></a>
		
		<!--	<form id="add-to-favorites-form" method="POST" action="ajouterEnSelection.php">
			<button type="submit" id="ajouterEnSelection">Ajouter aux favoris</button>
	</form>

			<script type="text/javascript">
				document.getElementById("ajouterEnSelection").addEventListener("click", function(event) {
					// Empêche le formulaire de se soumettre

					event.preventDefault();

					// Récupère l'ID de l'article à ajouter aux favoris depuis le champ caché
					var articleId = document.getElementById("$id");

					var acheteurId = document.getElementById("$ID_acheteur");


					// Envoie une requête AJAX vers la page PHP correspondante pour ajouter l'article aux favoris
					var xhr = new XMLHttpRequest();

					xhr.open("POST", "ajouterEnSelection.php", true);
					xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					xhr.onreadystatechange = function() {
						if (xhr.readyState === 4 && xhr.status === 200) {
							location.reload();
						}
					};

					xhr.send("article_id=" + articleId);
					xhr.send("acheteur_id=" + acheteurId);

				});

				function miseEnSelection() {

					alert("ca marche");
				}*/
			</script>-->
		



		</section>
		<section id="temoignages">
			<h4>Contacter le vendeur</h4>
			<!-- Ajoutez ici des témoignages de clients satisfaits de votre produit -->
		</section>
	</main>
	<footer>
		<!-- Ajoutez ici votre pied de page avec des liens vers vos réseaux sociaux et vos informations de contact -->
	</footer>
	<!-- Ajoutez ici vos fichiers JavaScript -->

</body>

</html>