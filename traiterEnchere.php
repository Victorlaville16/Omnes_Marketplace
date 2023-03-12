<?php
session_start();
include('fonctions.php');

$id_utilisateur = $_SESSION['ID_utilisateur']; 
$id = $_POST['id'];
$montant = $_POST['montant'];

try {
  $conn = new PDO("mysql:host=localhost;dbname=marketplace", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Vérification si l'enchère est supérieure au prix actuel
  $sql = "SELECT * FROM vehicules WHERE ID_vehicule = '$id'";
  $resultat = $conn->prepare($sql);
  $resultat->execute();
  
  if ($resultat->rowCount() == 1) {
    $produit = $resultat->fetch();
    
    if ($montant > $produit['prix']) {
      // Mise à jour du prix du produit dans la base de données
      $sql = "UPDATE vehicules SET prix = '$montant' WHERE ID_vehicule = '$id'";
      $resultat = $conn->exec($sql);
      
      if ($resultat === false) {
        throw new Exception("Une erreur s'est produite lors de la mise à jour du prix du véhicule : " . $conn->errorInfo()[2]);
      } else {
        echo "Le prix du véhicule a été mis à jour avec succès.";
      }
      
      // Ajout de l'enchère dans la base de données
      $sql = "INSERT INTO encheres (ID_utilisateur, ID_produit, montant) VALUES ('$id_utilisateur', '$id', '$montant')";
      $resultat = $conn->exec($sql);
      
      if ($resultat === false) {
        throw new Exception("Une erreur s'est produite lors de l'ajout de l'enchère : " . $conn->errorInfo()[2]);
      } else {
        echo "L'enchère a été ajoutée avec succès.";
        setcookie('message', ' Votre enchère a bien été prise en compte', time() + 3600, '/');
        header('Location: encheres.php?ID_vehicule='.$id );
      }
      
    } else {
      echo "Le montant de l'enchère doit être supérieur au prix actuel.";
    }
    
  } else {
    echo "Le véhicule n'existe pas.";
  }
  
} catch (Exception $e) {
  echo $e->getMessage();
}

$conn = null;
?>
