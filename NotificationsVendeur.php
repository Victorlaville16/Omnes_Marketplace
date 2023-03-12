<?php session_start();
 ?>
<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
<meta charset="utf-8" /> 
<link rel="stylesheet" href="style.css" type = "text/css" />


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
        <li><a href="NotificationsVendeur.php"><font color="#00C2CB">Notifications</font></a></li>
        <li><a href="GererVosAnnonces.php">Gerer vos annonces</a></li>
        <li><a href="votreCompte.php">Votre Compte</a></li></big>
    </ul> 
</nav>

<div id="content">
    <h1 class="PremierTitre">Vos Notifications</h1>

    



    <h2>Première Notification</h2>

    <p>Votre annonce : ... a été acheter par la méthode : ...    et par : ....</p>
    <br>

    <h2>Deuxième Notification</h2>

    <p>Votre annonce : ... a été acheter par la méthode : ...    et par : ....</p>
    <br>

    <h2>Troisième Notification</h2>

    <p>Vous avez une demande de négociation pour votre annonce : ... 
        <br>
    Pour le montant de : ... à la place de : ...</p>



  
  
    
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