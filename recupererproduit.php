<?php
$req = $db->prepare('SELECT * FROM vehicules ORDER BY ID_vehicule ASC');
$req->execute();
$rows = $req->fetchAll();

/*
function recupererNumero()
{
    $req = $db->prepare('SELECT * FROM vehicules WHERE ID_vehicule = 1 ORDER BY ID_vehicule ASC');
    $req->execute();
    $rows = $req->fetchAll();
}
*/
?>