
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
        // L'utilisateur n'existe pas, on l'ajoute à la base de données
           
        echo "Le Vehicule n'existe pas";
    }
?>


<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script>
div {
    background-color: #f2f2f2;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}

button:hover {
    background-color: #3e8e41;
}
</script>

<script>
     
     // Ajoutez cet événement au bouton de suppression
document.getElementById("btnSupprimer").addEventListener("click", function(){
   <?php// $request = $db->prepare("DELETE FROM vehicules WHERE kilometrage = '$kilometrage' AND nom = '$nom' AND carburant= '$carburant'");
   // $request->execute();
    header('Location: GererLesAnnonces.php');    ?>
    document.location.href='GererLesAnnonces.php'   ;  

});

// Ajoutez cet événement au bouton d'annulation
document.getElementById("btnAnnuler").addEventListener("click", function(){
    // Code pour annuler la suppression de l'article
<?php header('Location: GererLesAnnonces.php');  ?>

});
</script>
  
</head> 
<body> 
<h2>Confirmez-vous la suppression de l'article ?</h2>
    <button id="btnSupprimer">Supprimer</button>
    <button id="btnAnnuler">Annuler</button>
 

</body> 
</html>