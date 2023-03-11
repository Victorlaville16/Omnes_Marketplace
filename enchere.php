<!DOCTYPE html>
<html>

<head>
<title>Projet WEB</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
  <meta charset="utf-8" />
  <link href="style.css" rel="stylesheet" type="text/css" />
  <style>
    .produit {
      border: 1px solid black;
      margin: 10px;
      padding: 10px;
      display: inline-block;
    }

    .produit h2 {
      margin-top: 0;
    }

    .produit p {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <h1>Enchères</h1>

  <?php
  include('afficherCarrouselVehicule.php');
  include('fonctions.php');
  // Connexion à la base de données
  $conn = connectBD();

  // Vérification de la connexion
  
  // Traitement de l'enchère
  if (isset($_POST['id']) && isset($_POST['montant'])) {
    $id = $_POST['id'];
    $montant = $_POST['montant'];
    $id_utilisateur = 1; // remplacer 1 par l'ID de l'utilisateur connecté
  
    // Récupération du produit correspondant à l'enchère
    $sql = "SELECT * FROM vehicules WHERE id = '$id'";
    $resultat = $conn->prepare($sql);
    $resultat->execute();

    // Vérification de l'existence du produit
    if ($resultat->rowCount() == 1) {
      $produit = $resultat->fetch();

      // Vérification du montant enchéri
      if ($montant > $produit['prix']) {
        // Mise à jour du prix dans la base de données
        $sql = "UPDATE vehicules SET prix = '$montant' WHERE id = '$id'";
        $resultat = $conn->prepare($sql);

        if ($resultat->execute()) {
          // Enregistrement de l'enchère dans la base de données
          $date_enchere = date('Y-m-d H:i:s');
          $sql = "INSERT INTO encheres (id_produit, id_utilisateur, montant, date_enchere) VALUES ('$id', '$id_utilisateur', '$montant', '$date_enchere')";
          $resultat = $conn->prepare($sql);
          $resultat->execute();

          echo '<p>Votre enchère a été enregistrée avec succès !</p>';
        } else {
          echo '<p>Une erreur est survenue lors de l\'enregistrement de votre enchère. Veuillez réessayer plus tard.</p>';
        }
      } else {
        echo '<p>Votre enchère doit être supérieure au prix actuel.</p>';
      }
    } else {
      echo '<p>Le produit que vous souhaitez enchérir est introuvable.</p>';
    }
  }


  // Récupération des vehicules à partir de la base de données
  $sql = "SELECT * FROM vehicules WHERE methodeVente = 'encheres'";
  $resultat = $conn->prepare($sql);
  $resultat->execute();

  // Affichage des vehicules
  if ($resultat->rowCount() > 0) {

    while ($produit = $resultat->fetch()) {
      echo '<div class="produit">';
      echo '<h2>' . $produit['nom'] . '</h2>';
      afficherCarrouselVehicule($produit['ID_vehicule'], $conn);
      echo '<p>Description : ' . $produit['description'] . '</p>';
      echo '<p>Prix actuel : ' . $produit['prix'] . '</p>';

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
      echo '<form method="post" action="">';
      echo '<label for="montant">Montant de l\'enchère :</label>';
      echo '<input type="number" name="montant" id="montant" min="' . ($produit['prix'] + 1) . '" value="' . ($produit['prix'] + 1) . '">';
      echo '<input type="hidden" name="id" value="' . $produit['ID_vehicule'] . '">';
      echo '<button type="submit">Enchérir</button>';
      echo '</form>';

      echo '</div>';

    }
  } else {
    echo '<p>Aucun produit en vente pour le moment.</p>';
  }

  // Fermeture de la connexion à la base de données
  //mysqli_close($conn);
  ?>

</body>

</html>