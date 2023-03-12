<?php session_start() ?>

<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
<meta charset="utf-8" /> 
<link href="style.css" rel="stylesheet" type="text/css"/> 
</head> 
<style type="text/css">


.description {
    height:200px;
    width:70%;
}
tr{
    width: 100%;
}

.carburant{
    width:50%;
    border-left: 100%;
}

.form{
    height:50%;
    width:80%;

}

.methode{
    width:50%;
}




</style>
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
                window.location.href="Accueil.php"   ;     


                }
            };
            xhr.send();
            });
</script>
</div>

<nav>
    <ul>
    <li><a href="AccueilVendeur.php"><big>Acceuil</a></li>
        <li><a href="ToutParcourirVendeur.php">Tout Parcourir</a></li>
        <li><a href="NotificationsVendeur.php">Notifications</a></li>
        <li><a href="deposer_vendeur.php"><font color="#00C2CB">Déposer une annonce</font></a></li>
        <li><a href="votreCompte.php">Votre Compte</a></li></big>
    </ul> 
</nav>

<div id="content">

    <form class="form" action="creationVente.php" method="post" enctype="multipart/form-data">
    <tr>
                <td>Méthode de vente</td><br>
                <td><select name="methode" id="methode" class="methode">
                <option value="immediate">Vente immediate</option>
                <option value="negociation">Vente avec negociation</option>
                <option value="encheres">Vente aux enchères</option>
            </select><br><br>
            </tr>
            <tr><br>
                <td>Nom produit</td><br>
                <td><input type="text" name="nom_prod"> </td><br><br>
            </tr>
        <tr>
            <td>Prix</td><br>
            <td><input type="number" name="prix"> </td><br><br>
        </tr>
        <tr>
            <td>Kilometrage</td><br>
            <td><input type="number" name="kilometrage"> </td><br><br>
        </tr>
        <tr>
            <td >Carburant</td><br>
            <td class="carburant" >
                <select name="carburant" class="carburant">
                <option value="essence">essence</option>
                <option value="diesel">diesel</option>
                <option value="electrique">electrique</option>
                <option value="hybride">hybride</option>
                <option value="autre">autre</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Description</td><br>
            <td><input type="text" name="description" class="description"> </td><br><br>
        </tr>
        <tr>
            <td>Image 1</td>
            <td><input type="file" name="image1"> </td><br>
        </tr>
        <tr>
            <td>Image 2</td>
            <td><input type="file" name="image2"> </td><br>
        </tr>
        <tr>
            <td>Image 3</td>
            <td><input type="file" name="image3"> </td><br><br>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Valider">
            </td>
        </tr>

</form>

</div>

<div id="footer">Copyright &copy; 2023, Omnes MarketPlace<br /> 
<p>Coordonnées : -
 <a href="mailto:contact-OmnesMarketPlace@gmail.com">contact-OmnesMarketPlace@gmail.com </a> 
 <br>
- 04 78 95 62 31</p>

</div> 
</div>

</body> 
</html>