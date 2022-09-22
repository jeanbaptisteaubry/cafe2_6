<?php

echo "entreprise demandée : ".$_REQUEST["id"]."<br>";

$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

$reqTxt = "SELECT * FROM entreprise where id = :id";
//echo "<br> $reqTxt <br>";
$reqBDD = $bdd->prepare($reqTxt);
$etat = $reqBDD->execute(array(
    'id' => $_REQUEST["id"],
));
$table = $reqBDD->fetchAll();

$entreprise = $table[0];
    echo " denominationSociale : $entreprise[denominationSociale] <br>
           raisonSociale :  $entreprise[raisonSociale]  <br>
           Adresse : $entreprise[Adresse] <br>
           CP : $entreprise[CP] <br>
           Ville : $entreprise[Ville] <br>
           mailContact : $entreprise[mailContact] <br>
        ";
