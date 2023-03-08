<?php session_start(); ?>
<?php
    //include('fonctions.php');

    if(isset($_SESSION['id'])){
        if($_SESSION['typeCompte']=='1'){
        // On récupère le type de l'utilisateur : vendeur, acheteur, admin
        /*
        On redirige selon le type vers 
        */
            header('Location: PageAdmin.php');
        }
        if($_SESSION['typeCompte']=='2'){//vendeur 

            header('Location: PageVendeur.php');



        }

        if($_SESSION['typeCompte']=='3'){//acheteur
        header('Location: PageAcheteur.php');
        }
    }
else{


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