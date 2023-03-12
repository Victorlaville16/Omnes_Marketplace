<?php
session_start();

include('fonctions.php');

    
    $db = connectBD();


$ID_vehicule = $_GET['ID_vehicule'];
$acheteurId = $_GET['ID_acheteur'];


// Ajouter l'article aux favoris de l'utilisateur dans la base de données
/*$userId = $_SESSION['user_id'];
$sql = "INSERT INTO favoris (user_id, article_id) VALUES ($userId, $articleId)";
$result = mysqli_query($connexion, $sql);
*/

$request = $db->prepare ("SELECT * FROM selection WHERE ID_vehicule = $ID_vehicule AND ID_acheteur=$acheteurId");
$request->execute();
$resultat=$request->fetch();



if($resultat=null){

  $request = $db->prepare ("INSERT INTO selection (ID_vehicule,ID_Acheteur) VALUES ('$ID_vehicule','$acheteurId')");
$request->execute();

  
 }
 
header("Location: ToutParcourirAcheteur.php");
 exit;


/*
if ($result) {
  // La requête a réussi, retourner une réponse 200 OK
  http_response_code(200);
} else {
  // La requête a échoué, retourner une réponse 500 Internal Server Error
  http_response_code(500);
}*/

?>