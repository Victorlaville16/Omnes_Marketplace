<?php session_start(); ?>
<?php
include('fonctions.php');
$ID_acheteur = getIDAcheteur($_SESSION['ID_utilisateur'])
    ?>

<!DOCTYPE html>

<head>
    <title>Projet WEB</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />

    <style>
        input,
        textarea {
            background-color: #f5f5f5;
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

                deconnexion.addEventListener("click", function () {
                    // Envoyer une requête AJAX au serveur pour déconnecter la session
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "deconnexion.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            console.log(xhr.responseText);
                            // Recharger la page pour afficher les modifications
                            window.location.href = "Accueil.php"
                        }
                    };
                    xhr.send();
                });
            </script>
        </div>

        <nav>
            <ul>
                <!--  <li><i class="fa-solid fa-shop"></i></li>-->
                <li><a href="Accueil.php"><big>Acceuil</a></li>
                <li><a href="ToutParcourir.php">Tout Parcourir</a></li>
                <li><a href="Notifications.php">Notifications</a></li>
                <li><a href="VotreSelection.php">Panier</a></li>
                <li><a href="PageAcheteur.php">
                        <font color="#00C2CB">Votre Compte</font>
                    </a></li></big>
            </ul>
        </nav>

        <div id="content">
            <h1 class="PremierTitre">Bienvenue sur votre compte :
                <?php


                echo " " . getPrenom($_SESSION['ID_utilisateur']) . " " . getNom($_SESSION['ID_utilisateur']) ?>
            </h1>





            <h1>Articles achetés</h1>
            <h2>Enchères</h2>
            <img src="VoitureCollection.jpg" width="20%">
            <p>
                <font size=5%>Montant actuel de l'enchere : ...</font>
            </p>


            <h1>Informations utilisateur</h1>
            <h2>Vos informations</h2>
            <ul>
                <form action="saisirInformationsAcheteur.php" method="post">
                    <li>
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom"
                            value="<?php echo getPrenom($_SESSION['ID_utilisateur']) ?>" readonly>
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>

                    <li>
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="<?php echo getNom($_SESSION['ID_utilisateur']) ?>"
                            readonly>
                    </li>

                    <li>
                        <label for="telephone">Telephone :</label>
                        <input type="text" id="telephone" name="telephone"
                            value="<?php echo getTelephone($_SESSION['ID_utilisateur']); ?>" readonly>
                    </li>

                    <li>
                        <label for="adresse1">Adresse de livraison n°1 :</label>
                        <input type="textarea" id="adresse1" name="adresse1"
                            value="<?php echo getAdresse($_SESSION['ID_utilisateur'], 1); ?>" readonly>
                    </li>

                    <li>
                        <label for="codePostal1">Code Postal :</label>
                        <input type="text" id="codePostal1" name="codePostal1"
                            value="<?php echo getCodePostal($_SESSION['ID_utilisateur'], 1); ?>" readonly>
                    </li>

                    <li>
                        <label for="ville1">Ville :</label>
                        <input type="text" id="ville1" name="ville1"
                            value="<?php echo getVille($_SESSION['ID_utilisateur'], 1); ?>" readonly>
                    </li>

                    <li>
                        <label for="adresse2">Adresse de livraison n°2 :</label>
                        <input type="text" id="adresse2" name="adresse2"
                            value="<?php echo getAdresse($_SESSION['ID_utilisateur'], 2); ?>" readonly>
                    </li>

                    <li>
                        <label for="codePostal2">Code Postal :</label>
                        <input type="text" id="codePostal2" name="codePostal2"
                            value="<?php echo getCodePostal($_SESSION['ID_utilisateur'], 2); ?>" readonly>
                    </li>

                    <li>
                        <label for="ville2">Ville :</label>
                        <input type="text" id="ville2" name="ville2"
                            value="<?php echo getVille($_SESSION['ID_utilisateur'], 2); ?>" readonly>
                    </li>
                    <li>
                        <label for="pays">Pays :</label>
                        <input type="text" id="pays" name="pays"
                            value="<?php echo getPays($_SESSION['ID_utilisateur']); ?>" readonly>
                    </li>

                    <li>
                        <button type="button" onclick="activerEdition()">Modifier</button>
                        <button type="submit" id="enregistrer" disabled>Enregistrer</button>
                    </li>


                </form>
            </ul>

            <script>
                function activerEdition() { // lorsque les boutons sont cliqués : change la couleur de fond et permet la modif


                    var element = document.getElementById("nom");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("prenom");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";

                    var element = document.getElementById("adresse1");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("codePostal1");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("ville1");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("adresse2");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("codePostal2");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("ville2");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("pays");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    var element = document.getElementById("telephone");
                    element.removeAttribute("readonly");
                    element.style.backgroundColor = "#E6E6FA";
                    document.getElementById("enregistrer").removeAttribute("disabled");
                }
            </script>

            <br>

            <h2>Informations de paiement</h2>
            <ul>
                <form action="saisirInformationsCarte.php" method="post">
                    <li>
                        <label for="nomCarte">Nom sur la carte :</label>
                        <input type="text" id="nomCarte" name="nomCarte" value="<?php echo getNomCarte($ID_acheteur) ?>"
                            readonly>
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>
                    <li>
                        <label for="type">Type de carte :</label>
                        <select id="type" name="type">
                                <option value="visa">Visa</option>
                                <option value="MasterCard">MasterCard</option>
                                <option value="American Express">American Express</option>
                                <option value="Paypal">Paypal</option>
                            </select>
                        
                        
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>
                    <li>
                        <label for="date_expiration">Date d'expiration :</label>
                        <input type="date" id="date_expiration" name="date_expiration"
                            value="<?php echo getDateExpiration($ID_acheteur) ?>" readonly>
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>
                    <li>
                        <label for="code">Code :</label>
                        <input type="text" id="code" name="code" value="<?php echo getCodeCarte($ID_acheteur) ?>"
                            readonly>
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>
                    <li>
                        <button type="button" onclick="activerEditionCarte()">Modifier</button>
                        <button type="submit" id="enregistrerCarte" disabled>Enregistrer</button>
                    </li>
                </form>
                <script>
                    function activerEditionCarte() { // lorsque les boutons sont cliqués : change la couleur de fond et permet la modif


                        var element = document.getElementById("nomCarte");
                        element.removeAttribute("readonly");
                        element.style.backgroundColor = "#E6E6FA";
                        var element = document.getElementById("type");
                        element.removeAttribute("readonly");
                        element.style.backgroundColor = "#E6E6FA";
                        var element = document.getElementById("date_expiration");
                        element.removeAttribute("readonly");
                        element.style.backgroundColor = "#E6E6FA";
                        var element = document.getElementById("code");
                        element.removeAttribute("readonly");
                        element.style.backgroundColor = "#E6E6FA";


                        document.getElementById("enregistrerCarte").removeAttribute("disabled");
                    }
                </script>
            </ul>

            <h1>Comptes Existants</h1>

            <h2>Vendeur</h2>
            <p>...</p>

            <h2>Acheteur</h2>
            <p>...</p>

            <h1>Demande de compte</h1>
            <p>...</p>





        </div>


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