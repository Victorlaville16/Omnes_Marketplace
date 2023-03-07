<?php session_start(); ?>

<?php
    // Fonctions pour récupérer les différentes infos de l'utilisateur pour afficher
    include('connexionBD.php');
    
    function getPrenom(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT prenom FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $prenom = $request->fetch();
        return $prenom['prenom'];
    }

    function getNom(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT nom FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $nom = $request->fetch();
        return $nom['nom'];
    }

    function getPhotoProfil(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT photo FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $photo = $request->fetch();
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo['photo'] ).'"/>';
    }
    
    function getTypeCompte(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT typeCompte FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $nom = $request->fetch();
        return $nom['typeCompte'];
    }

    function getIDUtilisateur(string $identifiant, PDO $db){
        //Connexion BD
        //$db = connectBD();
        $request = $db->prepare("SELECT ID_utilisateur FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $nom = $request->fetch();
        return $nom['ID_utilisateur'];
   }

    /* Fonction de démarrage d'une session, a besoin de l'identifiant de l'utilisateur*/ 
    

    function stopSession(){
        // Accède à une variable de session
        echo 'Au revoir ' . $_SESSION['id'] . '!';
        session_destroy();
    }
?>