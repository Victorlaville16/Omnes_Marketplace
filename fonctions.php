
<?php
    // Fonctions pour récupérer les différentes infos de l'utilisateur pour afficher
    include('connexionBD.php');
    
    function getPrenom(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT prenom FROM utilisateurs WHERE ID_utilisateur = '$identifiant'");
        $request->execute();
        $prenom = $request->fetch();
        return $prenom['prenom'];
    }

    function getNom(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT nom FROM utilisateurs WHERE ID_utilisateur = '$identifiant'");
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

   function getIDVendeur(int $ID_utilisateur, PDO $db){
        $request = $db->prepare("SELECT ID_vendeur FROM vendeurs WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $nom = $request->fetch();
        return $nom['ID_vendeur'];
   }

        /* Fonction de supression d'un produit, accessible par l'administrateur et le vendeur ?*/ 
    function deleteProduit(string $id_produit){
        $db = connectBD();
        $request = $db->prepare("DELETE FROM produits WHERE ID_produit = $id_produit");
        $request->execute();
    }

    function deleteUtilisateur(string $id_utilisateur){
        $db = connectBD();
        $request = $db->prepare("DELETE FROM utilisateurs WHERE ID_utilisateur = $id_utilisateur");
        $request->execute();
    }

    
    function deleteAcheterOuVendeur(string $id_utilisateur, int $type){
        $db = connectBD();
        if($type==2){
        $request = $db->prepare("DELETE FROM vendeurs WHERE ID_utilisateur = $id_utilisateur");
        $request->execute();
        } 
        if($type==3){
            $request = $db->prepare("DELETE FROM acheteur WHERE ID_utilisateur = $id_utilisateur");
            $request->execute();
    }
}


    function stopSession(){
        // Accède à une variable de session
        echo 'Au revoir ' . $_SESSION['id'] . '!';
        session_destroy();
    }
?>