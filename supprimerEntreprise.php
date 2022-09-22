<?php

//Association d'une variable PHP à chaque variable issue de la demande (REQUEST) Http
$id = $_REQUEST["id"];


//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Génération d'une requête SQL
$reqTxt = "DELETE entreprise.* FROM entreprise where id = :id";

//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
$reqBDD = $bdd->prepare($reqTxt);
$etat = $reqBDD->execute(array(
    'id' => $id,
));
//$etat : variable stockant l'issue de la requête

//Affichage du résultat de la requête :
if ($etat) {
    echo " 
Entreprise supprimée !
";
} else {
    echo 'archtung !!';
}











