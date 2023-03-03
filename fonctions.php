<?php
    // Fonctions pour récupérer les différentes infos de l'utilisateur pour afficher
    include('connexionBD.php');
    
    function recupPrenom(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT prenom FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $prenom = $request->fetch();
        return $prenom['prenom'];
    }

    function recupNom(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT nom FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $nom = $request->fetch();
        return $nom['nom'];
    }

    function afficherPhotoProfil(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT photo FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $photo = $request->fetch();
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo['photo'] ).'"/>';
    }
?>