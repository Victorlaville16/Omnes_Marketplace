<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
    //include('connexionBD.php');
    include('fonctions.php');
    //Connexion BD
    $db = connectBD();
    // Récupérer les données soumises via le formulaire
    $username = $_POST['identifiant'];
    $password = $_POST['password'];

    // Vérifier que l'utilisateur existe bien dans la base de données, récupérer son mdp
    $request = $db->prepare("SELECT password FROM utilisateurs WHERE identifiant = '$username'");
    $request->execute();
    $result = $request->fetch();

    if ($result > 0) {
        // L'utilisateur existe 
        // on vérifie son mdp 
        if($password == $result['password']){
            // Tout est bon, on ouvre sa session
            $_SESSION['id'] = $username;
            $_SESSION['typeCompte'] = getTypeCompte($username);
            // On redirige vers une page ?
            header('Location: Accueil.php');
        }else{
            // Mot de passe incorrect : réaffiche le formulaire
            header('Location: PageDeConnexion.php');
            
        }
    } else {
        // L'utilisateur n'existe pas : erreur utilisateur incorrect : réaffiche le formulaire
        
    }
?>
	
	
</body>

</html>
