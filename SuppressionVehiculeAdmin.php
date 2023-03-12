
<?php
    include('fonctions.php');
    //Connexion BD
    $db = connectBD();
    // Récupérer les données soumises via le formulaire
    $nom = $_POST['nom'];
    $kilometrage = $_POST['kilometrage'];
    $carburant = $_POST['carburant'];

    // Vérifier si l'utilisateur existe déjà dans la base de données



    $request = $db->prepare("SELECT * FROM vehicules WHERE kilometrage = '$kilometrage' AND nom = '$nom' AND carburant= '$carburant'");
    $request->execute();
    $result = $request->fetch();

    if ($result > 0) {

        //afficher nom/image/prix/kilometrage/description

        echo $result['nom'];
        echo '<br>';
        echo $result['prix'];
        echo '<br>';
        echo $result['carburant'];
        echo '<br>';
        echo $result['description'];
       echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['photo1'] ).'"/>';

        // L'utilisateur existe déjà

    } else {
        header("GererVosAnnonces.php");
        // L'utilisateur n'existe pas, on l'ajoute à la base de données
    }
?>


<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<<style type= text/css >
div {
    background-color: #f2f2f2;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}


.boutonSupprimer {
      background-color: green;
      border: none;
      color: white;
      padding: 20px 34px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .boutonAnnuler {
      background-color: red;
      border: none;
      color: white;
      padding: 20px 34px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin: 4px 2px;
      cursor: pointer;
    }
</style>
</head> 
<body> 
<h2>Confirmez-vous la suppression de l'article ?</h2>
<a href="SupprimerDefinitif.php?kilometrage=<?php echo $kilometrage;?>&nom=<?php echo $nom;?>&carburant=<?php echo $carburant;?>"><button class="boutonSupprimer" type="submit">Supprimer définitivement</button></a>
<a href="GererLesAnnonces.php" class="boutonAnnuler">Annuler</a>


</body> 
</html>