<?php session_start(); ?>
<?php
include('fonctions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par la méthode POST
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse1 = $_POST['adresse1'];
    $codePostal1 = $_POST['codePostal1'];
    $ville1 = $_POST['ville1'];
    $adresse2 = $_POST['adresse2'];
    $codePostal2 = $_POST['codePostal2'];
    $ville2 = $_POST['ville2'];
    $pays = $_POST['pays'];
    $telephone = $_POST['telephone'];



    $db = connectBD();

    // Traiter les données reçues
    // ...
    $ID_utilisateur= $_SESSION['ID_utilisateur'];
    $request = $db->prepare("UPDATE acheteur SET adresse1='$adresse1', codePostal1='$codePostal1', 
    ville1='$ville1', adresse2='$adresse2', codePostal2='$codePostal2', ville2='$ville2', pays='$pays', telephone='$telephone' WHERE ID_utilisateur = $ID_utilisateur ");
    $request->execute();

    $request = $db->prepare("UPDATE utilisateurs SET prenom='$prenom', nom='$nom' WHERE ID_utilisateur = $ID_utilisateur ");
    $request->execute();
    

    // Afficher un message de confirmation
    echo "Les données ont été reçues avec succès !";
    header('Location: PageAcheteur.php');
}
?>