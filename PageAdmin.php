<?php session_start(); ?>
<?php
include('fonctions.php');
?>

<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
<meta charset="utf-8" /> 
<link rel="stylesheet" href="style.css" type = "text/css" />
<style type="text/css">
    
   #PremierTitre{
    width: 100%;
  height: 10%;
  margin: 0;
  padding-left: 15px;
}

   
#photoProfil{
 height: 10px;
}
</style>

</head> 
<body> 
<div id="wrapper">
    <div id="header">
        <img src="titre+logo1.png" width="100%">
        <button id="deconnexion"><big>Deconnexion</button>
        <script>
            const deconnexion = document.getElementById("deconnexion");

            deconnexion.addEventListener("click", function() {
            // Envoyer une requête AJAX au serveur pour déconnecter la session
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "deconnexion.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                // Recharger la page pour afficher les modifications
                window.location.href="Accueil.php"                }

            };
            xhr.send();
            });
</script>
</div>

<nav>
    <ul>
      <!--  <li><i class="fa-solid fa-shop"></i></li>-->
        <li><a href="AccueilAdmin.php"><big>Accueil</a></li>
        <li><a href="ToutParcourirAdmin.php">Tout Parcourir</a></li>
        <li><a href="NotificationsAdmin.php">Notifications</a></li>
        <li><a href="GererLesAnnonces.php">Gerer les annonces</a></li>
        <li><a href="votreCompte.php"><font color="#00C2CB">Votre Compte</font></a></li></big>
    </ul> 
</nav>

<div id="content">
    <h1 class="PremierTitre">Bienvenue sur votre compte :  
    
    
    <?php
    echo " ".getPrenom($_SESSION['ID_utilisateur']) ." ".getNom($_SESSION['ID_utilisateur']) ;?>

    <div id="photoProfil">
    <?php


            $db = connectBD();

         /*   Création du conteneur, c'est-à-dire l'image qui va contenir la version
            redimensionnée. Elle aura donc les nouvelles dimensions.
            */
           
            /*
              Importation de l'image source. Stockage dans une variable pour pouvoir
              effectuer certaines actions.
            */
            $ID_utilisateur= $_SESSION['ID_utilisateur'];
            $request = $db->prepare("SELECT photo FROM utilisateurs WHERE ID_utilisateur = '$ID_utilisateur'");
            $request->execute();
            $photo = $request->fetch();


        //  if(list($source_largeur, $source_hauteur) = getimagesize($photo, array $image_info = null)){

              /*
                Calcul de la valeur dynamique en fonction des dimensions actuelles
                de l'image et de la dimension fixe que nous avons précisée en argument.
              */
        
              //  $nouv_hauteur = $source_hauteur*0.01;
               // $nouv_largeur = $source_largeur*0.01;

               // $image = imagecreatetruecolor($nouv_largeur, $nouv_hauteur);
             

          //  $source_image = imagecreatefromstring(file_get_contents($photo));
            /*
              Copie de l'image dans le nouveau conteneur en la rééchantillonant. Ceci
              permet de ne pas perdre de qualité.
            */
          //  imagecopyresampled($image, $source_image, 0, 0, 0, 0, $nouv_largeur, $nouv_hauteur, $source_largeur, $source_hauteur);
// Le fichier
$filename = $photo;//'<img src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>';

// Définition de la largeur et de la hauteur maximale
$width = 5;
$height = 5;

// Content type
header('Content-Type: image/jpeg');

// Cacul des nouvelles dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Redimensionnement
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Affichage
//magejpeg($image_p, null, 100);

          //  echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';
            /*
              Si nous avons spécifié une sortie et qu'il s'agit d'un chemin valide (accessible
              par le script)
           /* $ID_utilisateur= $_SESSION['ID_utilisateur'];
            $request = $db->prepare("SELECT photo FROM utilisateurs WHERE ID_utilisateur = '$ID_utilisateur'");
            $request->execute();
            $photo = $request->fetch();
            resize_image($photo, 200, 200);

           // $image_scaled = imagescale(0.8, $photo, 10%, 10%);
    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $image_scaled ).'"/>';*/

   // getPhotoProfil($_SESSION['ID_utilisateur']);
?>
</div> </h1>
    



    <h1>Vos articles en ventes</h1>
    <h2>Enchères</h2>
    
    <img src="VoitureCollection.jpg" width="20%">
    <p><font size=5%>Montant actuel de l'enchere : ...</font></p>


    <h2>Achat Immédiat / Vente en négociation</h2>
    <p><img src="twingo2.jpg" width="20%">
        <p><font size=5%>Montant : ...</font></p>

    </p>
    <br>

    <h1>Comptes Existants</h1>

    <h2>Vendeur</h2>
    <p> Compte : <br>
    <?php
    $db = connectBD();
        $request = $db->prepare("SELECT * FROM utilisateurs WHERE typeCompte = '2'");
        $request->execute();
        

        while($resultat=$request->fetch()){
            echo "-" .$resultat['prenom']. " ".$resultat['nom']. " ". "Adresse mail : ".$resultat['mail'] ;
            echo "<br>";       }

    ?>
    <h2>Acheteur</h2>
    <p> Compte : <br>
    <?php
    $db = connectBD();
        $request = $db->prepare("SELECT * FROM utilisateurs WHERE typeCompte = '3'");
        $request->execute();
        

        while($resultat=$request->fetch()){
            echo "-" .$resultat['prenom']. " ".$resultat['nom']." ". "Adresse mail : ".$resultat['mail'] ;
            echo "<br>";       }

    ?>
   
    <h1>Ajouter / Supprimer des comptes</h1>
    <p>
   <a href="formulaire.php">Cliquer ICI pour ajouter des comptes</a>
    <br>
    <br>
    <a href="formulaireSuppression.php">Cliquer ICI pour Supprimer des comptes</a>
        </p>


    


   

  
    
</div>


<div id="footer">
    <div id="texteFooter">Copyright &copy; 2023, Omnes MarketPlace<br /> 
<p>Coordonnées : -
 <a href="mailto:contact-OmnesMarketPlace@gmail.com">contact-OmnesMarketPlace@gmail.com </a> 
 <br>
- 04 78 95 62 31</p></div>
<div id="carte"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.3144844008166!2d2.2793500032437124!3d48.89034349361312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f87a70f65d9%3A0xbc442e671fa31e6a!2s71%20Rue%20Chaptal%2C%2092300%20Levallois-Perret!5e0!3m2!1sfr!2sfr!4v1677602696554!5m2!1sfr!2sfr" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>


</div> 
</div>

</body> 
</html>

<?php
function RedimensionnerImage($source, $type_value = "W", $new_value,  $compression = 70, $sortie = "") {
  /*
    Récupération des dimensions de l'image afin de vérifier
    que ce fichier correspond bel et bien à un fichier image.
    Stockage dans deux variables le cas échéant.
  */
  if( !( list($source_largeur, $source_hauteur) = @getimagesize($source) ) ) {
    return false;
  }
  /*
    Calcul de la valeur dynamique en fonction des dimensions actuelles
    de l'image et de la dimension fixe que nous avons précisée en argument.
  */
  if( $type_value == "H" ) {
    $nouv_hauteur = $new_value;
    $nouv_largeur = ($new_value / $source_hauteur) * $source_largeur;
  } else {
    $nouv_largeur = $new_value;
    $nouv_hauteur = ($new_value / $source_largeur) * $source_hauteur;
  }
  /*
 Création du conteneur, c'est-à-dire l'image qui va contenir la version
  redimensionnée. Elle aura donc les nouvelles dimensions.
  */
  $image = imagecreatetruecolor($nouv_largeur, $nouv_hauteur);
  /*
    Importation de l'image source. Stockage dans une variable pour pouvoir
    effectuer certaines actions.
  */
  $source_image = imagecreatefromstring(file_get_contents($source));
  /*
    Copie de l'image dans le nouveau conteneur en la rééchantillonant. Ceci
    permet de ne pas perdre de qualité.
  */
  imagecopyresampled($image, $source_image, 0, 0, 0, 0, $nouv_largeur, $nouv_hauteur, $source_largeur, $source_hauteur);
  /*
    Si nous avons spécifié une sortie et qu'il s'agit d'un chemin valide (accessible
    par le script)
  */
  if(strlen($sortie) > 0 and @touch($sortie)) {
    /*
     Enregistrement de l'image et affichage d'une notification à l'utilisateur.
    */
    imagejpeg($image, $sortie, $compression);
    echo "Fichier sauvegardé.";
  /*
    Sinon...
  */
  } else {
    /*
     ...Nous indiquons au navigateur que nous affichons une image en définissant le
     header et nous affichons l'image.
    */
    header("Content-Type: image/jpeg");
    imagejpeg($image, NULL, $compression);
  }
  /*
    Libération de la mémoire allouée aux deux images (sources et nouvelle).
  */
  imagedestroy($image);
  imagedestroy($source_image);
}
?>