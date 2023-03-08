<?php session_start() ?>

<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
<meta charset="utf-8" /> 
<link href="style.css" rel="stylesheet" type="text/css"/> 
</head> 

</style>
<body> 
<div id="wrapper">
    <div id="header">
        <div id="titre"><img src="titre2.png" alt="javalogo" height="200" width="700"></div>

    <div id="logo"><img src="logo.png" alt="javalogo" height="150" width="150"></div>
</div>

<nav>
    <ul>
      <!--  <li><i class="fa-solid fa-shop"></i></li>-->
      <li><a href="#"><big>Acceuil</a></li>
        <li><a href="#">Tout Parcourir</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Déposer une annonce</a></li>
        <li><a href="#">Votre Compte</a></li></big>
    </ul> 
</nav>

<div id="content">
    <form action="creationVente.php" method="post" enctype="multipart/form-data">
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
            <td>Carburant</td><br>
            <td>
                <select name="carburant" id="pet-select">
                <option value="">----------Carburant----------</option>
                <option value="essence">essence</option>
                <option value="diesel">diesel</option>
                <option value="electrique">electrique</option>
                <option value="hybride">hybride</option>
                <option value="autre">autre</option>
            </select><br><br>
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