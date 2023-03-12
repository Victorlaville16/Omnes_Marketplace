<?php session_start();
?>
 <?php

    include('fonctions.php');
    $dsn = "mysql:host=localhost;dbname=marketplace;charset=utf8mb4";
    $username = "root";
    $password = "";
    
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM vehicules";
    $stmt = $pdo->query($sql);?>

<!DOCTYPE html>

<head>
    <title>Projet WEB</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="SiteWeb.js"></script>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script>
        const select = document.getElementById("choix");
        select.addEventListener('change', function() {
            var valeur = select.options[select.selectedIndex].value;
            valeur = parseInt(valeur);

            switch (valeur) {
                case 1:
                    changeURL("AccueilVoiture.html");
                    break;
                case 2:
                    changeURL("AccueilMoto.html");
                    break;
                default:
                    console.log('default');
            }

        });

        function changeURL(url) {
            document.location.href = url;
        }
    </script>

<style type= text/css >
.SelectionVoiture{
    float: left;
    width: 100%;
    padding-top: 100px;

}

.SelectionMoto{
    float: left;
    padding-top: 100px;
    width: 100%;

}

</style>



</head>

<body>
    <div id="wrapper">
        <div id="header">
            <img src="titre+logo1.png" width="100%">
        </div>

        <nav>
            <ul>
                <!--  <li><i class="fa-solid fa-shop"></i></li>-->


                <li><a href="Accueil.php"><big><font color="#00C2CB">Accueil</font></a></li>
                <li><a href="ToutParcourir.php">Tout Parcourir</a></li>
                <li><a href="Notifications.php">Notifications</a></li>
                <li><a href="#">Panier</a></li>
                <li><a href="votreCompte.php">Votre Compte</a></li></big>
            </ul>
        </nav>

        <div id="content">


            <h1>Présentation</h1>

            <div class="presentation">
            <p style="font-size:18px;font-family:Arial;"> Bienvenue sur notre site web, votre destination en ligne pour acheter des voitures neuves et d'occasion. </p>
            <p style="font-size:18px;font-family:Arial;"> Nous sommes fiers de vous offrir une plateforme de marketplace qui vous permet de trouver rapidement et facilement la voiture de vos rêves, quels que soient vos besoins et votre budget.</p>

            <p style="font-size:18px;font-family:Arial;"> Notre sélection de voitures est vaste et variée, allant des modèles économiques et pratiques aux voitures haut de gamme et de luxe. </p>
            <p style="font-size:18px;font-family:Arial;"> Nous travaillons avec les meilleurs concessionnaires et vendeurs de voitures pour vous offrir des options de qualité et des offres compétitives.</p>
            <p style="font-size:18px;font-family:Arial;"> Naviguer sur notre site est simple et intuitif, vous pouvez filtrer votre recherche par nom, date de publication, kilométrage, prix et plus encore. </p>
            <p style="font-size:18px;font-family:Arial;"> Nous avons également inclus des photos détaillées de chaque voiture pour vous aider à mieux comprendre et évaluer votre choix.</p>

            <p style="font-size:18px;font-family:Arial;"> Notre équipe de professionnels est toujours disponible pour répondre à toutes vos questions et vous aider à prendre la meilleure décision pour votre achat de voiture. Nous nous engageons à offrir un service client exceptionnel, avant et après votre achat.</p>
            <p style="font-size:18px;font-family:Arial;"> Nous sommes impatients de vous aider à trouver votre prochaine voiture sur notre marketplace. Merci de nous faire confiance et de parcourir notre sélection de voitures neuves et d'occasion.</p></div>

          <!--  <form action="" method="post">
                <label for="choix">Faite votre choix</label>

                <div class="bloc">
                    <div class="select">
                        <select name="choix" id="choix">
                            <option value="1" selected> Selection Voiture</option>
                            <option value="2"><a href="AccueilMoto.html">Selection Moto</a></option>
                        </select>
                    </div>
                </div>
            </form>
    -->
    <div class="SelectionVoiture">
            <h1 class="TitreGlissant">Selection du jour Voiture</h1>


            <div class="slider">
                <div class="slide-track">
                    <div class="slide">
                        <a href="pagevente.php?id=<?php
                        $row = $stmt->fetch();
                         echo $row['ID_vehicule'] ?>">
                          <?php  getPhotoVehicule($row['ID_vehicule'], 1, $pdo); ?>
                    </div>
                    <div class="slide">
                    <a href="pagevente.php?id=<?php
                        $row = $stmt->fetch();
                         echo $row['ID_vehicule'] ?>">
                          <?php  getPhotoVehicule($row['ID_vehicule'], 1, $pdo); ?>
                    </div>
                    <div class="slide">
                    <a href="pagevente.php?id=<?php
                        $row = $stmt->fetch();
                         echo $row['ID_vehicule'] ?>">
                          <?php  getPhotoVehicule($row['ID_vehicule'], 1, $pdo); ?>
                    </div>
                    <div class="slide">
                    <a href="pagevente.php?id=<?php
                        $row = $stmt->fetch();
                         echo $row['ID_vehicule'] ?>">
                          <?php  getPhotoVehicule($row['ID_vehicule'], 1, $pdo); ?>
                    </div>
                </div>
            </div>
    </div>

            <div class="SelectionMoto">
            <h1 class="TitreGlissant">Selection du jour Moto</h1>

            <div class="slider">
                <div class="slide-track">
                    <div class="slide">
                        <img src="moto1.jpg" height="100%" width="100%" alt="" />
                    </div>
                    <div class="slide">
                        <img src="moto2.jpg" height="100%" width="100%" alt="" />
                    </div>
                    <div class="slide">
                        <img src="moto3.jpg" height="100%" width="100%" alt="" />
                    </div>
                    <div class="slide">
                        <img src="moto4.jpg" height="100%" width="100%" alt="" />
                    </div>
                </div>
            </div>
            </div>

        </div>


        <div id="footer">
            <div id="texteFooter">Copyright &copy; 2023, Omnes MarketPlace<br />
                <p>Coordonnées : -
                    <a href="mailto:contact-OmnesMarketPlace@gmail.com">contact-OmnesMarketPlace@gmail.com </a>
                    <br>
                    - 04 78 95 62 31
                </p>
            </div>
            <div id="carte"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.3144844008166!2d2.2793500032437124!3d48.89034349361312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f87a70f65d9%3A0xbc442e671fa31e6a!2s71%20Rue%20Chaptal%2C%2092300%20Levallois-Perret!5e0!3m2!1sfr!2sfr!4v1677602696554!5m2!1sfr!2sfr" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>


        </div>
    </div>

</body>

</html>