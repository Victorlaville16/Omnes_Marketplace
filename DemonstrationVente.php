<?php
    session_start();
    include('fonctions.php');
    //Connexion BD
    $db = connectBD();
    
    function getPhotoProfil(string $identifiant){
        //Connexion BD
        $db = connectBD();
        $request = $db->prepare("SELECT photo FROM utilisateurs WHERE identifiant = '$identifiant'");
        $request->execute();
        $photo = $request->fetch();
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo['photo'] ).'"/>';
    }

    echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo['photo1'] ).'"/>';
?>
