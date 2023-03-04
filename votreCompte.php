<?php session_start(); ?>
<?php
    //include('fonctions.php');

    if(isset($_SESSION['id'])){
        // On récupère le type de l'utilisateur : vendeur, acheteur, admin
        /*
        On redirige selon le type vers 
        */
        header('Location: test.php');
    }else{


        /*
        
        formulaire de connexion : id et password -> en dessous à côté de submit, bouton créer un compte -> href...
        verif que le compte existe
            -> Si existe pas on le renvoie vers le formulaire de création de compte
        mise à jour des variables de donnees.php
        recharge la page votreCompte.php
        */
        header('Location: PageDeConnexion.php');
    }

?>
