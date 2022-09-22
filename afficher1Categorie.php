<?php

echo "<H1>Fiche catégorie</H1>";
//echo "entreprise demandée : ".$_REQUEST["id"]."<br>";

//Etablissement d'une liaison à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Création de la requête paramétrée
$reqTxt = "SELECT * FROM categorie where id = :id";

//Paramétrage de la requête
$reqBDD = $bdd->prepare($reqTxt);
$etat = $reqBDD->execute(array(
    'id' => $_REQUEST["id"],
));
$table = $reqBDD->fetchAll();

//Affichage des informations relatives à cette entreprise
$categorie = $table[0];
echo " Nom : $categorie[nom] <br>
       Description :  $categorie[description]  <br> ";