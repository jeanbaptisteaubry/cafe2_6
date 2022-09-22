<?php
echo "<H1>Liste des catégories</H1>";

//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Interrogation de la base de donnée
$reqBDD = $bdd->query('SELECT * FROM categorie');
$table = $reqBDD->fetchAll(); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]

if(count($table) > 0) {
    // On affiche chaque entrée une à une :
    foreach ($table as $ligne) {
        //foreach : parcourir pour chaque composant d'un ensemble
        //ensemble : $table
        // composant ? => ligne de la table que j'ai appelé $ligne...
        echo "<a href='afficher1Categorie.php?id=$ligne[id]'> 
            $ligne[nom] 
            $ligne[description] 
            </a><br>"; // Pour chaque entrée, j'affiche la dénominiation dans un lien ouvrant la liste des informations de l'entreprise
    }
    /*
    for($i=0; $i< count($table); $i++)
    {
        $ligne = $table[$i];
    }*/
    /*
      $i = 0;
      while($i< count($table)
      {
          $ligne = $table[$i];
        $i++;
      }
    */
}
/*
}
else
{
echo " Pas encore d'enregistrement ";
}*/
