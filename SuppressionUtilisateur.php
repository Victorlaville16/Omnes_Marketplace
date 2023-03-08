<?php
    include('fonctions.php');
    //Connexion BD
    $db = connectBD();
    // Récupérer les données soumises via le formulaire
    $nom = $_POST['nom'];
    $username = $_POST['identifiant'];
    $mail = $_POST['mail'];

    // Vérifier si l'utilisateur existe déjà dans la base de données
    $request = $db->prepare("SELECT * FROM utilisateurs WHERE identifiant = '$username'");
    $request->execute();
    $result = $request->fetch();
    $ID_utilisateur = getIDUtilisateur($username, $db);
    $type=getTypeCompte($username);

    if ($result > 0) {
        deleteUtilisateur($ID_utilisateur);
        deleteAcheterOuVendeur($ID_utilisateur,$type);
        
        echo "Le Compte est supprime";
    #    header('Location: PageAdmin.php');


        // L'utilisateur existe déjà

    } else {
        // L'utilisateur n'existe pas, on l'ajoute à la base de données
           


        echo "Le Compte n'existe pas";
        header('Location: PageAdmin.php');


    }
?>

