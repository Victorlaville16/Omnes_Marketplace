<?php
    include('fonctions.php');
    //Connexion BD
    $db = connectBD();
    // Récupérer les données soumises via le formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $username = $_POST['identifiant'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $mail = $_POST['mail'];
    //$photo = $_FILES['profil']['tmp_name'];
    //$email = $_POST['email'];

    // Vérifier si l'utilisateur existe déjà dans la base de données
    $request = $db->prepare("SELECT * FROM utilisateurs WHERE identifiant = '$username'");
    $request->execute();
    $result = $request->fetch();

    if ($result > 0) {
        // L'utilisateur existe déjà
        setcookie('message', 'utilisateur existe déja', time() + 3600, '/');
        header('Location: PageDeConnexion.php');


    } else {
        // L'utilisateur n'existe pas, on l'ajoute à la base de données
        $request = $db->prepare ("INSERT INTO utilisateurs (prenom, nom, identifiant, password, typeCompte, mail) 
                                    VALUES ('$prenom', '$nom', '$username', '$password', '$type', '$mail')");          
        $request->execute();

        $ID_utilisateur = getIDUtilisateur($username, $db);
        $photo = file_get_contents("user.jpg");
        $request = $db->prepare ("UPDATE utilisateurs SET photo = ? WHERE ID_utilisateur  = $ID_utilisateur");
        $request->bindParam(1, $photo, PDO::PARAM_LOB);   
        $request->execute();


        if($type==2){
         $request = $db->prepare ("INSERT INTO vendeurs (ID_utilisateur) 
                                    VALUES ('$ID_utilisateur')");          


         $request->execute();
        }

        if($type==3){
            $request = $db->prepare ("INSERT INTO acheteur (ID_utilisateur) 
            VALUES ('$ID_utilisateur')");          


        $request->execute();
        $ID_acheteur = getIDAcheteur($ID_utilisateur);
        $request = $db->prepare ("INSERT INTO carte (ID_acheteur) 
            VALUES ('$ID_acheteur')");          


        $request->execute();

        }


        echo "Votre compte a été créé avec succès.<br>";
        header('Location: PageDeConnexion.php');


    }
?>
