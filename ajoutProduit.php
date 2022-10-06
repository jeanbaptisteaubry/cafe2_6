<?php

$Nom = $_REQUEST["Nom"];
$Description = $_REQUEST["Description"];
$PUHT = $_REQUEST["PUHT"];
$TxTva = $_REQUEST["TxTva"];
$idCategorie =  $_REQUEST["idCategorie"];

//var_dump($_REQUEST);
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Génération d'une requête SQL
$reqTxt = "
INSERT INTO `produit`
    (`nom`, `description`, `PUHT`, `TxTVA`, `idCategorie`) 
VALUES (:nom, :description, :PUHT, :TxTVA, :idCategorie)
    ";
$reqBDD = $bdd->prepare($reqTxt);

$etat = $reqBDD->execute(array(
    "nom" => $Nom,
    "description" => $Description,
    "PUHT" => $PUHT,
    "TxTVA" => $TxTva,
    "idCategorie" => $idCategorie,
));

if($etat)
{
    echo "Le produit $Nom a été créé.";
}
else
{
    echo "Quelque chose s'est mal passé... TOOOOO !!";
}