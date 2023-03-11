<?php session_start(); ?>
<?php
include('fonctions.php');
$ID_vehicule = $_GET["ID_vehicule"];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par la méthode POST
    $nomCarte = $_POST['nomCarte'];
    $type = $_POST['type'];
    $date_expiration = $_POST['date_expiration'];
    $code = $_POST['code'];




    $db = connectBD();

    // Get données BD
    // ...
    $ID_acheteur = getIDAcheteur($_SESSION['ID_utilisateur']);
    $request = $db->prepare("SELECT * FROM carte WHERE ID_acheteur = $ID_acheteur ");
    $request->execute();
    $result = $request->fetch();

    //vérification

    if ($result['nom'] == $nomCarte && $result['type'] == $type && $result['date_expiration'] == $date_expiration && $result['code'] == $code) {
        //Bonne carte, acheteur peut acheter
        // Produit à retirer dans la bd
        //informer le vendeur
        $request = $db->prepare("UPDATE vehicules SET ID_acheteur='$ID_acheteur'WHERE ID_vehicule = $ID_vehicule ");
        $request->execute();


        header('Location: ToutParcourir.php');
    } else {
        //Informations invalides : faire pop up comme connexion utilisateur
        header('Location: acheter.php');
    }

}
?>