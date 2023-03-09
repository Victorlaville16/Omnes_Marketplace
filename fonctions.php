
<?php
    // Fonctions pour récupérer les différentes infos de l'utilisateur pour afficher
    include('connexionBD.php');
    
    function getPrenom(int $ID_utilisateur){
        //Connexion BD
        $db = connectBD();

        $request = $db->prepare("SELECT prenom FROM utilisateurs WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $prenom = $request->fetch();
        return $prenom['prenom'];
    }

    function getNom(int $ID_utilisateur){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT nom FROM utilisateurs WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $nom = $request->fetch();
        return $nom['nom'];
    }

    /*Fonction de récupération de l'adresse de livraison de l'acheteur*/
    function getAdresse(int $ID_utilisateur, int $numAdresse){
        //Connexion BD
        $db = connectBD();
        $adresse = 'adresse' .$numAdresse;
        $request = $db->prepare("SELECT $adresse FROM acheteur WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $add = $request->fetch();
        return $add[$adresse];
    }

        /*Fonction de récupération de la ville de l'adresse de livraison de l'acheteur*/
    function getVille(int $ID_utilisateur, int $numVille){
        //Connexion BD
        $db = connectBD();
        $ville = 'ville' .$numVille;
        $request = $db->prepare("SELECT $ville FROM acheteur WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $v = $request->fetch();
        return $v[$ville];
    }

    /*Fonction de récupération du code postal de l'adresse de livraison de l'acheteur*/
    function getCodePostal(int $ID_utilisateur, int $numCode){
        //Connexion BD
        $db = connectBD();
        $code = 'codePostal' .$numCode;
        $request = $db->prepare("SELECT $code FROM acheteur WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $cp = $request->fetch();
        return $cp[$code];
    }
    function getPays(int $ID_utilisateur){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT pays FROM acheteur WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $pays = $request->fetch();
        return $pays['pays'];
    }
    function getTelephone(int $ID_utilisateur){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT telephone FROM acheteur WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $telephone = $request->fetch();
        return $telephone['telephone'];
    }

    function getPhotoProfil(int $ID_utilisateur){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT photo FROM utilisateurs WHERE ID_utilisateur = '$ID_utilisateur'");
        $request->execute();
        $photo = $request->fetch();
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo['photo'] ).'"/>';
    }

    function getPhotoVehicule(int $ID_vehicule, int $numPhoto, PDO $db){
        //Connexion BD
        $photo = 'photo' .$numPhoto;
        $request = $db->prepare("SELECT $photo FROM vehicules WHERE ID_vehicule = '$ID_vehicule'");
        $request->execute();
        $result = $request->fetch();
        echo '<img class="image" src="data:image/jpeg;base64,'.base64_encode( $result[$photo] ).'" />';
    }
    function getPrixVehicule(int $ID_vehicule, PDO $db){
        //Connexion BD
        $request = $db->prepare("SELECT prix FROM vehicules WHERE ID_vehicule = '$ID_vehicule'");
        $request->execute();
        $result = $request->fetch();
       return $result['prix'];
    }
    function getNomVehicule(int $ID_vehicule, PDO $db){
        //Connexion BD
        $request = $db->prepare("SELECT nom FROM vehicules WHERE ID_vehicule = '$ID_vehicule'");
        $request->execute();
        $result = $request->fetch();
       return $result['nom'];
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

   function getIDAcheteur(int $ID_utilisateur){
    $db = connectBD();
    $request = $db->prepare("SELECT ID_acheteur FROM acheteur WHERE ID_utilisateur = '$ID_utilisateur'");
    $request->execute();
    $nom = $request->fetch();
    return $nom['ID_acheteur'];
}
    /* Fonctions de recup des données de la carte de l'acheteur */
    function getNomCarte(int $ID_acheteur){
        $db = connectBD();
        $request = $db->prepare("SELECT nom FROM carte WHERE ID_acheteur = '$ID_acheteur'");
        $request->execute();
        $result = $request->fetch();
        return $result['nom'];
    }

    function getTypeCarte(int $ID_acheteur){
        $db = connectBD();
        $request = $db->prepare("SELECT type FROM carte WHERE ID_acheteur = '$ID_acheteur'");
        $request->execute();
        $result = $request->fetch();
        return $result['type'];
    }

    function getDateExpiration(int $ID_acheteur){
        $db = connectBD();
        $request = $db->prepare("SELECT date_expiration FROM carte WHERE ID_acheteur = '$ID_acheteur'");
        $request->execute();
        $result = $request->fetch();
        return $result['date_expiration'];
    }

    function getCodeCarte(int $ID_acheteur){
        $db = connectBD();
        $request = $db->prepare("SELECT code FROM carte WHERE ID_acheteur = '$ID_acheteur'");
        $request->execute();
        $result = $request->fetch();
        return $result['code'];
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