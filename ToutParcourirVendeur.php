<?php session_start();
include('fonctions.php');
 ?>
<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
<meta charset="utf-8" /> 
<link href="style.css" rel="stylesheet" type="text/css"/> 


</head> 
<body> 
<div id="wrapper">
    <div id="header">
        <img src="titre+logo1.png" alt="" width="100%" height="100%">
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

      <li><a href="AccueilVendeur.php"><big>Accueil</a></li>
        <li><a href="ToutParcourirVendeur.php"><font color="#00C2CB">Tout Parcourir</font></a></li>
        <li><a href="NotificationsVendeur.php">Notifications</a></li>
        <li><a href="GererVosAnnonces.php">Gerer vos annonces</a></li>
        <li><a href="votreCompte.php">Votre Compte</a></li></big>
    </ul> 
</nav>

<div id="content">
    <h1>Liste des objets en vente</h1>
    <form action="ToutParcourir.php" method="GET">
    <label for="tri">Trier par :</label>
    <select name="tri" id="tri">
      <option value="nom">Nom</option>
      <option value="prix">Prix</option>
      <option value="date">Date de publication</option>
      <option value="luxe">Voitures de luxe</option>
      <option value="sport">Voitures de sport</option>
      <option value="classique">Classique</option>
    </select>
    <input type="submit" value="Trier">
  </form>
      <?php //require_once('recupererproduit.php'); ?>
      <table>
        
        <?php
        // Connexion à la base de données
        $dsn = "mysql:host=localhost;dbname=marketplace;charset=utf8mb4";
        $username = "root";
        $password = "";

        try {
          $pdo = new PDO($dsn, $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Requête SQL pour récupérer tous les objets de la base de données
          $sql = "SELECT * FROM vehicules";

          // Tri des résultats si le paramètre "tri" est présent dans l'URL
          $orderBy = "date_ajout DESC";
          $whereClause = "";
          if (isset($_GET["tri"])) {
            switch ($_GET["tri"]) {
              case "nom":
                $orderBy = "nom ASC";
                $whereClause = "";
                break;
              case "prix":
                $orderBy = "prix ASC";
                $whereClause = "";
                break;
              case "date":
                $orderBy = "date_ajout DESC";
                $whereClause = "";
                break;
              case "luxe":
                $whereClause = "WHERE gamme = 'luxe'";
                $orderBy = "date_ajout DESC";
                break;
              case "sport":
                $whereClause = "WHERE gamme = 'sport'";
                $orderBy = "date_ajout DESC";
                break;
              case "classique":
                $whereClause = "WHERE gamme = 'ville'";
                $orderBy = "date_ajout DESC";
                break;
            }
          }

          $sql = "SELECT * FROM vehicules ".$whereClause." ORDER BY ".$orderBy;

          // Exécuter la requête
          $stmt = $pdo->query($sql);

          // Vérifier si la requête a renvoyé des résultats
          if ($stmt->rowCount() > 0) {
            // Afficher la table HTML avec les résultats
            $index = 1;
            $lien="";
            while ($row = $stmt->fetch()) {
              if($row['ID_acheteur']==0){
                if($row['methodeVente']== 'immediate'){
                  $lien = "pagevente.php?ID_vehicule=" .$row['ID_vehicule'];
                }elseif($row['methodeVente']== 'encheres'){
                  $lien = "encheres.php?ID_vehicule=" .$row['ID_vehicule'];
                  
                }

              ?>
              <section class="carrousel" aria-label="Gallery">
                <ol class="carrousel__viewport">
                  <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
                    <div class="carrousel__snapper">

                      <div class="overlay-image"><a href="<?php echo $lien ?>">

                          <?php  getPhotoVehicule($row['ID_vehicule'], 1, $pdo); ?>


                          <div class="hover">
                            <div class="text">Prix de vente :
                              <?php echo getPrixVehicule($row['ID_vehicule'], $pdo) . " $"; ?><br>
                              Nom du modèle :
                              <?php echo getNomVehicule($row['ID_vehicule'], $pdo); ?>
                            </div>
                          </div>
                      </div>


                    </div>
                  </li>
                  <?php $index = $index + 1 ?>
                  <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
                    <div class="carrousel__snapper">
                      <div class="overlay-image"><a href="<<?php echo $lien ?>">
                          <?php  getPhotoVehicule($row['ID_vehicule'], 2, $pdo); ?>


                          <div class="hover">



                            <div class="text">Prix de vente :
                              <?php echo getPrixVehicule($row['ID_vehicule'], $pdo) . " $"; ?><br>
                              Nom du modèle :
                              <?php echo getNomVehicule($row['ID_vehicule'], $pdo); ?>
                            </div>
                          </div>
                      </div>

                  </li>
                  <?php $index = $index + 1 ?>
                  <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
                    <div class="carrousel__snapper">
                      <div class="overlay-image"><a href="<?php echo $lien ?>">

                          <?php  getPhotoVehicule($row['ID_vehicule'], 3, $pdo); ?>

                          <div class="hover">
                            <div class="text">Prix de vente :
                              <?php echo getPrixVehicule($row['ID_vehicule'], $pdo) . " $"; ?><br>
                              Nom du modèle :
                              <?php echo getNomVehicule($row['ID_vehicule'], $pdo); ?>
                            </div>
                          </div>
                      </div>

                  </li>
                </ol>
               
              </section>
              <br>
              <?php
              $index = $index + 1;
              }
            }
          } else {
            echo "Aucun objet trouvé.";
          }
        } catch (PDOException $e) {
          echo "Connexion à la base de données impossible: " . $e->getMessage();
        }

        // Fermer la connexion à la base de données
        unset($pdo);
        ?>

      </table>

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