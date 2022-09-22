<?php
echo "<H1>Liste des entreprises</H1>";

//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Interrogation de la base de donnée
$reqBDD = $bdd->query('SELECT * FROM entreprise');
$table = $reqBDD->fetchAll(); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]

//table => Les résultats de la requête sous la forme d'un tableau de tableau : tableau [Ligne][Colonne]
//$count($table) => $count du nombre d'entrée dans $table[] donc le nombre de lignes !!
//En sachant que la première ligne commence à 0 !
echo "<table border='1'>
    <th>Raison sociale</th>
    <th>Dénomination sociale</th>";
if(count($table) > 0) {
    // On affiche chaque entrée une à une :
    foreach ($table as $ligne) {
        echo "<tr>";
        //foreach : parcourir pour chaque composant d'un ensemble
        //ensemble : $table
        // composant ? => ligne de la table que j'ai appelé $ligne...
        echo "
            <td> 
            $ligne[raisonSociale] 
             </td>
               <td> 
            $ligne[denominationSociale] 
       
            </td>
            <td>
             <form action='afficher1Entreprise.php' method='post'>
                <input type='hidden' value='$ligne[id]' name='id'>
                <input type='submit' value='Afficher'>
             </form>
             </td>
              <td>
            <form action='supprimerEntreprise.php' method='post'>
                <input type='hidden' value='$ligne[id]' name='id'>
                <input type='submit' value='Supp'>
             </form>
             </td>"; // Pour chaque entrée, j'affiche la dénominiation dans un lien ouvrant la liste des informations de l'entreprise
        echo "<tr>";
    }
    echo "</table>";
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
