<?php 
require "connexion_BDD.php" ;

$pro_id=$_GET['pro_id'];

//construction de la requête DELETE sans injection SQL

$requete = $db->prepare("DELETE from produits
WHERE pro_id=:pro_id");

//$requete->bindValue(':sta_nom', $nom_station, PDO::PARAM_STR);
//$requete->bindValue(':sta_altitude', $altitude_station, PDO::PARAM_INT);
$requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);

$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

//redirection vers index.php
header("Location: index.php");




?>