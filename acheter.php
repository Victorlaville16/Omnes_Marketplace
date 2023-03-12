<?php 
session_start();
if (isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    // Afficher le message à l'utilisateur
	?>
	<script type="text/javascript">
	alert('<?php echo $message?>');
	</script>
	<?php
    // Supprimer le cookie
    setcookie('message', '', time() - 3600, '/');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	
</head>
<body>
    <?php $ID_vehicule = $_GET["ID_vehicule"];?>
<h2>Saisissez vos données de paiement</h2>
            <ul>
                <form action="validerPaiement.php?ID_vehicule=<?php echo $ID_vehicule?>" method='post'>
                    <li>
                        <label for="nomCarte">Nom sur la carte :</label>
                        <input type="text" id="nomCarte" name="nomCarte">
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
                        <input type="date" id="date_expiration" name="date_expiration">
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>
                    <li>
                        <label for="code">Code :</label>
                        <input type="password" id="code" name="code">
                        <!--<button type="button"><img src="icone_modif.jfif" alt="Modifier"></button>-->
                    </li>
                    <button type="submit" name="submit" class="btn">Valider</button>
                    
                </form>
                <a href="pagevente.php?id=<?php echo $ID_vehicule ?>">
			<button>Page précédente</button></a>
</body>
</html>