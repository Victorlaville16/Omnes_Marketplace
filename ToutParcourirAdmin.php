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

  <?php
  $db = connectBD();
  $request = $db->prepare("SELECT * FROM vehicules");
  $request->execute();

  ?>


      <li><a href="AccueilAdmin.php"><big>Accueil</a></li>
        <li><a href="ToutParcourirAdmin.php"><font color="#00C2CB">Tout Parcourir</font></a></li>
        <li><a href="Notifications.php">Notifications</a></li>
        <li><a href="GererLesAnnonces.php">Gérer Les Annonces</a></li>
        <li><a href="votreCompte.php">Votre Compte</a></li></big>
      </ul>
    </nav>

    <div id="content">
      <h1 class="PremierTitre">Tout Parcourir</h1>


      <?php
      $index = 1;
      while ($result = $request->fetch()) {

        ?>
        <section class="carrousel" aria-label="Gallery">
          <ol class="carrousel__viewport">
            <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
              <div class="carrousel__snapper">

                <div class="overlay-image"><a href="PageVoiture.html">
                    <?php getPhotoVehicule($result['ID_vehicule'], 1, $db); ?>

                    <div class="hover">
                      <div class="text">Prix de vente :
                        <?php echo getPrixVehicule($result['ID_vehicule'], $db) . " $"; ?><br>
                        Nom du modèle :
                        <?php echo getNomVehicule($result['ID_vehicule'], $db); ?>
                      </div>
                    </div>
                </div>
              </div>
            </li>
            <?php $index = $index + 1 ?>
            <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
              <div class="carrousel__snapper">
                <div class="overlay-image"><a href="PageVoiture.html">
                    <?php getPhotoVehicule($result['ID_vehicule'], 2, $db); ?>


                    <div class="hover">


                      <div class="text">Prix de vente :
                        <?php echo getPrixVehicule($result['ID_vehicule'], $db) . " $"; ?><br>
                        Nom du modèle :
                        <?php echo getNomVehicule($result['ID_vehicule'], $db); ?>
                      </div>
                    </div>
                </div>

            </li>
            <?php $index = $index + 1 ?>
            <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
              <div class="carrousel__snapper">
                <div class="overlay-image"><a href="PageVoiture.html">

                    <?php getPhotoVehicule($result['ID_vehicule'], 3, $db); ?>

                    <div class="hover">
                      <div class="text">Prix de vente :
                        <?php echo getPrixVehicule($result['ID_vehicule'], $db) . " $"; ?><br>
                        Nom du modèle :
                        <?php echo getNomVehicule($result['ID_vehicule'], $db); ?>
                      </div>
                    </div>
                </div>

            </li>
          </ol>
          <aside class="carrousel__navigation">
            <ol class="carrousel__navigation-list">
              <li class="carrousel__navigation-item">
                <a href="<?php '#carrousel_slide' . ($index - 2) ?>" class="carrousel__navigation-button">Go to slide 1</a>
              </li>
              <li class="carrousel__navigation-item">
                <a href="<?php '#carrousel_slide' . ($index - 1) ?>" class="carrousel__navigation-button">Go to slide 2</a>
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
      ?>



      <div id="footer">
        <div id="texteFooter">Copyright &copy; 2023, Omnes MarketPlace<br />
          <p>Coordonnées : -
            <a href="mailto:contact-OmnesMarketPlace@gmail.com">contact-OmnesMarketPlace@gmail.com </a>
            <br>
            - 04 78 95 62 31
          </p>
        </div>
        <div id="carte"><iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.3144844008166!2d2.2793500032437124!3d48.89034349361312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f87a70f65d9%3A0xbc442e671fa31e6a!2s71%20Rue%20Chaptal%2C%2092300%20Levallois-Perret!5e0!3m2!1sfr!2sfr!4v1677602696554!5m2!1sfr!2sfr"
            width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe></div>


      </div>
    </div>

</body>

</html>