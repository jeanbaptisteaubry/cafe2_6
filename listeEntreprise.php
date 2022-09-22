<?php
echo "<H1>Liste des entreprises</H1>";

//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');


$reqBDD = $bdd->query('SELECT * FROM entreprise');
$table = $reqBDD->fetchAll(); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]
// On affiche chaque entrée une à une

if(count($table) > 0) {
    foreach ($table as $ligne) {
        echo "<a href='afficher1Entreprise.php?id=$ligne[id]'> $ligne[denominationSociale] $ligne[raisonSociale] </a><br>
        ";
    }
}
else
{
    echo " Pas encore d'enregistrement ";
}

//$ligne[Adresse] $ligne[CP] $ligne[Ville] $ligne[mailContact]