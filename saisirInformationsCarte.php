<?php session_start(); ?>
<?php
include('fonctions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par la méthode POST
    $nomCarte = $_POST['nomCarte'];
    $type = $_POST['type'];
    $date_expiration = $_POST['date_expiration'];
    $code = $_POST['code'];
    



    $db = connectBD();

    // Traiter les données reçues
    // ...
    $ID_acheteur= getIDAcheteur($_SESSION['ID_utilisateur']);
    $request = $db->prepare("UPDATE carte SET nom='$nomCarte', type='$type', 
    date_expiration='$date_expiration', code='$code' WHERE ID_acheteur = $ID_acheteur ");
    $request->execute();

    // Afficher un message de confirmation
    echo "Les données ont été reçues avec succès !";
    header('Location: PageAcheteur.php');
}
?>