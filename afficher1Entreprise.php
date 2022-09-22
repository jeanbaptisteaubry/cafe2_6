<?php
echo "<H1>Fiche d'information d'entreprise</H1>";
//echo "entreprise demandée : ".$_REQUEST["id"]."<br>";

//Etablissement d'une liaison à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Création de la requête paramétrée
$reqTxt = "SELECT * FROM entreprise where id = :id";

//Paramétrage de la requête
$reqBDD = $bdd->prepare($reqTxt);
$etat = $reqBDD->execute(array(
    'id' => $_REQUEST["id"],
));
$table = $reqBDD->fetchAll();

//Affichage des informations relatives à cette entreprise
$entreprise = $table[0];
echo " denominationSociale : $entreprise[denominationSociale] <br>
       raisonSociale :  $entreprise[raisonSociale]  <br>
       Adresse : $entreprise[Adresse] <br>
       CP : $entreprise[CP] <br>
       Ville : $entreprise[Ville] <br>
       mailContact : $entreprise[mailContact] <br>";
