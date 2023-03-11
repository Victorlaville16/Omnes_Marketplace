<?php
session_start();
include('fonctions.php');
?>

<!DOCTYPE html>

<head>
<title>Projet WEB</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
  <meta charset="utf-8" />
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <h1>Liste des objets en vente</h1>

  
  <?php //require_once('pass.php'); ?>
  <?php //require_once('insertion.php'); ?>
  <div id="wrapper">
    

    <nav>
      <ul>
        <!--  <li><i class="fa-solid fa-shop"></i></li>-->
        <li><a href="1ere conception.html"><big>Accueil</a></li>
        <li><a href="ToutParcourir.php">Tout Parcourir</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Panier</a></li>
        <li><a href="#">Votre Compte</a></li></big>
      </ul>
    </nav>
    

    <div id="content">
    <form action="ToutParcourir.php" method="GET">
    <label for="tri">Trier par :</label>
    <select name="tri" id="tri">
      <option value="nom">Nom</option>
      <option value="prix">Prix</option>
      <option value="date">Date de publication</option>
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
          if (isset($_GET["tri"])) {
            switch ($_GET["tri"]) {
              case "nom":
                $orderBy = "nom ASC";
                break;
              case "prix":
                $orderBy = "prix ASC";
                break;
              case "date":
                $orderBy = "date_ajout DESC";
                break;
            }
          }
          $sql .= " ORDER BY " . $orderBy;

          // Exécuter la requête
          $stmt = $pdo->query($sql);

          // Vérifier si la requête a renvoyé des résultats
          if ($stmt->rowCount() > 0) {
            // Afficher la table HTML avec les résultats
            $index = 1;
            while ($row = $stmt->fetch()) {
              if($row['ID_acheteur']==0){

              ?>
              <section class="carrousel" aria-label="Gallery">
                <ol class="carrousel__viewport">
                  <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
                    <div class="carrousel__snapper">

                      <div class="overlay-image"><a href="pagevente.php?ID_vehicule=<?php echo $row['ID_vehicule'] ?>">

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
                      <div class="overlay-image"><a href="pagevente.php?ID_vehicule=<?php echo $row['ID_vehicule'] ?>">
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
                      <div class="overlay-image"><a href="pagevente.php?ID_vehicule=<?php echo $row['ID_vehicule'] ?>">

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
                <aside class="carrousel__navigation">
                  <ol class="carrousel__navigation-list">
                    <li class="carrousel__navigation-item">
                      <a href="<?php '#carrousel_slide' . ($index - 2) ?>" class="carrousel__navigation-button">Go to slide
                        1</a>
                    </li>
                    <li class="carrousel__navigation-item">
                      <a href="<?php '#carrousel_slide' . ($index - 1) ?>" class="carrousel__navigation-button">Go to slide
                        2</a>
                    </li>
                    <li class="carrousel__navigation-item">
                      <a href="<?php '#carrousel_slide' . $index ?>" class="carrousel__navigation-button">Go to slide 3</a>
                    </li>

                    </li>
                  </ol>
                </aside>
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

    <div id="footer">Copyright &copy; 2023, Omnes MarketPlace<br />
      <p>Coordonnées : -
        <a href="mailto:contact-OmnesMarketPlace@gmail.com">contact-OmnesMarketPlace@gmail.com </a>
        <br>
        - 04 78 95 62 31
      </p>

    </div>
  </div>
  <?php //require_once('close.php');?>

</body>

</html>