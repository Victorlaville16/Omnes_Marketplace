<?php
session_start();
if (isset($_COOKIE['message'])) {
  $message = $_COOKIE['message'];
  // Afficher le message à l'utilisateur
  ?>
  <script type="text/javascript">
    alert('<?php echo $message ?>');
  </script>
  <?php
  // Supprimer le cookie
  setcookie('message', '', time() - 3600, '/');
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Projet WEB</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
  <meta charset="utf-8" />
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <h1>Enchères</h1>

  <?php
  include('afficherCarrouselVehicule.php');
  include('fonctions.php');
  // Connexion à la base de données
  $host = "localhost";
  $dbname = "marketplace";
  $user = "root";
  $password = "";

  try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Activation des erreurs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    // Affichage d'un message d'erreur en cas d'échec de connexion
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
  }
  $id = $_GET["ID_vehicule"];
  // Vérification de la connexion
  
  // Traitement de l'enchère
  if (isset($_POST['submit'])) {
    $montant = $_POST['montant'];
    $id_utilisateur = 1; // remplacer 1 par l'ID de l'utilisateur connecté
    $sql = "SELECT * FROM vehicules WHERE ID_vehicule = '$id'";
    $resultat = $conn->prepare($sql);
    $resultat->execute();
    if ($resultat->rowCount() == 1) {
      $produit = $resultat->fetch();
      if ($montant > $produit['prix']) {
        $sql = "UPDATE vehicules SET prix = '$montant' WHERE ID_vehicule = '$id'";

        if ($conn->query($sql) === TRUE) {
          echo "Le prix du véhicule a été mis à jour avec succès.";
          //Ajout de l'enchère dans la base de données
          $sql_enchere = "INSERT INTO encheres (id_produit, ID_utilisateur, montant) VALUES ('$id', '$id_utilisateur', '$montant')";
          if ($conn->query($sql_enchere) === TRUE) {
            echo "L'enchère a été ajoutée avec succès.";
          } else {
            echo "Une erreur s'est produite lors de l'ajout de l'enchère : " . $conn->$error;
          }
        } else {
          echo "Une erreur s'est produite lors de la mise à jour du prix du véhicule : " . $conn->$error;
        }
      } else {
        echo "Le montant de l'enchère doit être supérieur au prix actuel.";
      }
    } else {
      echo "Le véhicule demandé n'existe pas.";
    }
  }

  // Récupération des vehicules à partir de la base de données
  $sql = "SELECT * FROM vehicules WHERE ID_vehicule = $id";
  $resultat = $conn->prepare($sql);
  $resultat->execute();

  // Affichage des vehicules
  if ($resultat->rowCount() > 0) {

    while ($produit = $resultat->fetch()) {
      echo '<div class="produit">';
      echo '<h2>' . $produit['nom'] . '</h2>';
      afficherCarrouselVehicule($produit['ID_vehicule'], $conn, 'encheres');
      echo '<p>Description : ' . $produit['description'] . '</p>';
      echo '<p>Prixactuel : ' . $produit['prix'] . '</p>';

      // Calcul du temps restant
      $date_fin = strtotime($produit['date_fin']);
      $maintenant = time();
      $temps_restant = $date_fin - $maintenant;

      // Conversion en jours, heures, minutes et secondes
      $jours = floor($temps_restant / (60 * 60 * 24));
      $heures = floor(($temps_restant - ($jours * 60 * 60 * 24)) / (60 * 60));
      $minutes = floor(($temps_restant - (($jours * 60 * 60 * 24) + ($heures * 60 * 60))) / 60);
      $secondes = $temps_restant % 60;

      echo '<p>Temps restant : ' . $jours . ' jours, ' . $heures . ' heures, ' . $minutes . ' minutes et ' . $secondes . ' secondes</p>';

      // Affichage du formulaire d'enchère
      if ($temps_restant < 0) {
        echo '<form method="post" action="traiterEnchere.php">';
        echo '<input type="hidden" name="id" value="' . $produit['ID_vehicule'] . '">';
        echo '<input type="hidden" name="prix_actuel" value="' . $produit['prix'] . '">';
        echo '<p>Entrez votre enchère (minimum ' . ($produit['prix'] + 100) . ' €) :</p>';
        echo '<input type="number" name="montant" min="' . ($produit['prix'] + 100) . '" step="100" required>';
        echo '<input type="submit" value="Enchérir">';
       
        echo '</form>';
        echo'<br><br>';
        echo '<a href="ToutParcourir.php">
				<button>Retour à la liste des objets</button>
			</a>';
      } else {
        echo '<p>La vente est terminée.</p>';
      }

      echo '</div>';
    }

  } else {
    echo '<p>Aucun produit en vente pour le moment.</p>';
  }

  // Fermeture de la connexion à la base de données
  $conn = null;

  ?>
</body>

</html>