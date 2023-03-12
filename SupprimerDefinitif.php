<?php
session_start();

include('fonctions.php');
$db = connectBD();
$nom = $_GET['nom'];
$kilometrage = $_GET['kilometrage'];
$carburant = $_GET['carburant'];


 $request = $db->prepare("DELETE FROM vehicules WHERE kilometrage = '$kilometrage' AND nom = '$nom' AND carburant= '$carburant'");
 $request->execute();
 $ID_utilisateur=$_SESSION['ID_utilisateur'];

 if(!($ID_utilisateur=getIDVendeur($ID_utilisateur, $db))){
header("Location: GererLesAnnonces.php");
 }
 else{
    header("Location: GererVosAnnonces.php");
 }
 exit;

?>