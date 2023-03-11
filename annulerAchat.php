<?php
    session_start();
    include('fonctions.php');
    $ID_vehicule = $_GET['ID_vehicule'];
     //informer le vendeur
     $db = connectBD();
     $request = $db->prepare("UPDATE vehicules SET ID_acheteur='0'WHERE ID_vehicule = $ID_vehicule ");
     $request->execute();


     header('Location: PageAcheteur.php');
?>