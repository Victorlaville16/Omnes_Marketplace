<?php
    session_start();
    include('fonctions.php');
    //Connexion BD
    $db = connectBD();
    // Récupérer les données soumises via le formulaire
    $nom = $_POST['nom_prod'];
    $prix = $_POST['prix'];
    $kilometrage = $_POST['kilometrage'];
    $carburant = $_POST['carburant'];
    $description = $_POST['description'];
    $image1 = $_FILES['image1'];
    $image2 = $_FILES['image2'];
    $image3 = $_FILES['image3'];

    //On récupère l'ID Vendeur à partir de l'id utilisateur
    $ID_vendeur = getIDVendeur($_SESSION['ID_utilisateur'], $db);

    // L'utilisateur n'existe pas, on l'ajoute à la base de données
    $request = $db->prepare ("INSERT INTO vehicules (nom, prix, kilometrage, carburant, description, ID_vendeur) 
                                VALUES ('$nom', '$prix', '$kilometrage', '$carburant', '$description', '$ID_vendeur')");          
    $request->execute();

    $photo_tmp1 = $_FILES['image1']['tmp_name'];
    $photo_tmp2 = $_FILES['image2']['tmp_name'];
    $photo_tmp3 = $_FILES['image3']['tmp_name'];

    // Lecture du contenu du fichier
    $photo_contenu1 = file_get_contents($photo_tmp1);
    $photo_contenu2 = file_get_contents($photo_tmp2);
    $photo_contenu3 = file_get_contents($photo_tmp3);

    $request = $db->prepare ("UPDATE vehicules SET photo1 = ? WHERE ID_vendeur  = $ID_vendeur");
    $request->bindParam(1, $photo_contenu1, PDO::PARAM_LOB);   
    $request->execute();

    $request = $db->prepare ("UPDATE vehicules SET photo2 = ? WHERE ID_vendeur  = $ID_vendeur");
    $request->bindParam(1, $photo_contenu2, PDO::PARAM_LOB);   
    $request->execute();

    $request = $db->prepare ("UPDATE vehicules SET photo3 = ? WHERE ID_vendeur  = $ID_vendeur");
    $request->bindParam(1, $photo_contenu3, PDO::PARAM_LOB);   
    $request->execute();


    $request = $db->prepare("SELECT photo1 FROM vehicules WHERE ID_vendeur = '$ID_vendeur'");
    $request->execute();
    $photo = $request->fetch();
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo['photo1'] ).'"/>';
?>
