<?php
    include('connexionBD.php');
    //Connexion BD
    $db = connectBD();
    // Récupérer les données soumises via le formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $username = $_POST['identifiant'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    //$email = $_POST['email'];
    

    // Vérifier si l'utilisateur existe déjà dans la base de données
    $request = $db->prepare("SELECT * FROM utilisateurs WHERE identifiant = '$username'");
    $request->execute();
    $result = $request->fetch();

    if ($result > 0) {
        // L'utilisateur existe déjà
        echo "Cet utilisateur existe déjà.";
    } else {
        // L'utilisateur n'existe pas, on l'ajoute à la base de données
        
        $request = $db->prepare ("INSERT INTO utilisateurs (prenom, nom, identifiant, password, typeCompte) VALUES ('$prenom', '$nom', '$username', '$password', '$type')");
        $request->execute();

        echo "Votre compte a été créé avec succès.<br>";
    }
?>