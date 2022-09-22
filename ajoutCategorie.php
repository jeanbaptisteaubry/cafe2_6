<?php

//Association d'une variable PHP à chaque variable issue de la demande (REQUEST) Http
$Nom = $_REQUEST["Nom"];
$Description = $_REQUEST["Description"];


//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Génération d'une requête SQL
$reqTxt = "INSERT INTO `categorie`( `nom`, `Description`) 
VALUES ( :Nom  , :Description )";

//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
$reqBDD = $bdd->prepare($reqTxt);
$etat = $reqBDD->execute(array(
    'Nom' => $Nom,
    'Description' => $Description
));
//$etat : variable stockant l'issue de la requête

//Affichage du résultat de la requête :
if ($etat) {
    echo " 
Catégorie ajoutée !
";
} else {
    echo 'archtung !!';
}











