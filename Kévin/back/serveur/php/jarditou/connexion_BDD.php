<?php
if ($_SERVER["SERVER_NAME"] == "dev.amorce.org")
{
    // Paramètres de connexion serveur distant
    $host = "localhost";
    $login= "login dev amorce donné par votre formateur";     // Votre loggin d'accès au serveur de BDD 
    $password="password dev amorce donné par votre formateur";    // Le Password pour vous identifier auprès du serveur
    $base = "sur dev amorce BDD vaut votre login dev amorce donné par votre formateur ";    // La BDD avec laquelle vous voulez travailler 
}

// ici un 'OU' car il se peut que le 'localhost' ne soit pas reconnu !
if ($_SERVER["SERVER_NAME"] == "localhost"||$_SERVER["SERVER_NAME"] == "127.0.0.1")

// également pour éviter la condition ci-dessus, ne mettre qu'un 'ELSE'

//else
{
    // Paramètres de connexion serveur local
    $host = "localhost";
    $login= "root";     // Votre loggin d'accès au serveur de BDD 
    $password="";    // Le Password pour vous identifier auprès du serveur
    $base = "hotel";    // La bdd avec laquelle vous voulez travailler 
}
   // Paramètre de connexion serveur
   $host = "localhost";
   $login= "root";  // Votre loggin d'accès au serveur de BDD 
   $password="";    // Le Password pour vous identifier auprès du serveur
   $base = "jarditou";  // La bdd avec laquelle vous voulez travailler 

   try 
   {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        return $db;
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 

?>