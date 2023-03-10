<?php 
    function afficherCarrouselVehicule(int $ID_vehicule, $db){
        $index = 1;
        ?>
        <section class="carrousel" aria-label="Gallery">
          <ol class="carrousel__viewport">
            <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
              <div class="carrousel__snapper">

                <div class="overlay-image"><a href="PageVoiture.html">
                    <?php getPhotoVehicule($ID_vehicule, 1, $db); ?>

                  
                </div>

              </div>
            </li>
            <?php $index = $index + 1 ?>
            <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
              <div class="carrousel__snapper">
                <div class="overlay-image"><a href="PageVoiture.html">
                    <?php getPhotoVehicule($ID_vehicule, 2, $db); ?>


                    
                </div>

            </li>
            <?php $index = $index + 1 ?>
            <li id=<?php 'carrousel_slide' . $index ?> tabindex="0" class="carrousel__slide">
              <div class="carrousel__snapper">
                <div class="overlay-image"><a href="PageVoiture.html">

                    <?php getPhotoVehicule($ID_vehicule, 3, $db); ?>

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
?>