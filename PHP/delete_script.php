<?php

//récupération de l'identifiant passé en GET
$pro_id=$_GET['pro_id'];

//permet de vérifier que l'on a bien l'identifiant attendu
//mettre le header plus bas en commentaire !

//var_dump("id : ".$sta_id);
//echo("<br>");

//**********     connection à la base de données    **********

// si la ligne : 'require "connection_bdd.php";', ci-dessous est décommentée, 
// il faut commenter la ligne : '$db = new PDO('mysql:host=localhost;charset=utf8;dbname=hotel', 'root', '');'
//et décommenter la ligne : '$db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base.'', $login, $password);'

//require "connection_bdd.php";

try{        
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
    //$db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base.'', $login, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e) {

    echo "La connection à la base e données a échoué ! <br>";
    echo "Merci de bien vérifier vos paramètres de connection ...<br>";
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

//construction de la requête DELETE sans injection SQL

$requete = $db->prepare("DELETE from produits WHERE pro_id=:pro_id");
echo "$pro_id";
//$requete->bindValue(':sta_nom', $nom_station, PDO::PARAM_STR);
//$requete->bindValue(':sta_altitude', $altitude_station, PDO::PARAM_INT);
$requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);

$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();


header("Location: tableau.php");

?>
