<?php
    // Fonction de connexion à la base de données

    function connectBD(){
        try{
			$db = new PDO('mysql:host=localhost; dbname=marketplace; charset=utf8','root', '');
		}
		catch(Exception $e){
			die('Erreur : ' .$e->getMessage());
		}
        return $db;
    }
?>



