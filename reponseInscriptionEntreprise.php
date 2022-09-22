<?php

$denominationSociale = $_REQUEST["denominationSociale"];
$raisonSociale = $_REQUEST["raisonSociale"];
$Adresse = $_REQUEST["Adresse"];
$CP = $_REQUEST["CP"];
$Ville = $_REQUEST["Ville"];
$mailContact = $_REQUEST["mailContact"];



//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Envoie d'une requête

$reqTxt = "INSERT INTO `entreprise`
        ( `denominationSociale`, `raisonSociale`, `Adresse`, `CP`, `Ville`, `mailContact`) 
VALUES  ( :denominationSociale, :raisonSociale, :Adresse, :CP, :Ville, :mailContact)";
//echo "<br> $reqTxt <br>";
$reqBDD = $bdd->prepare($reqTxt);
$etat = $reqBDD->execute(array(
    'denominationSociale' => $denominationSociale,
    'raisonSociale' => $raisonSociale,
    'Adresse' => $Adresse,
    'CP' => $CP,
    'Ville' => $Ville,
    'mailContact' => $mailContact
));
if ($etat) {
    echo " 
 Bonjour,
 Nous vous remercions pour votre inscription. Nous vous contacterons une fois examen de votre 
 dossier à l'adresse suivant : $mailContact <br>.
 L'équipe Café.com
";
}
else
{
    echo 'archtung !!';
}











