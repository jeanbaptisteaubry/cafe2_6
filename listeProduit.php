<?php

echo "<H1>Liste des produits</H1>";

//Etablissement de la connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Interrogation de la base de donnée
$reqBDD = $bdd->query('
SELECT produit.*, categorie.nom as nom_categorie, categorie.description as description_categorie
FROM produit, categorie
where produit.idCategorie = categorie.id;');
$tableProduit = $reqBDD->fetchAll(); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]

//table => Les résultats de la requête sous la forme d'un tableau de tableau : tableau [Ligne][Colonne]
//$count($table) => $count du nombre d'entrée dans $table[] donc le nombre de lignes !!
//En sachant que la première ligne commence à 0 !
echo "<table border='1'>
    <th>Nom </th>
    <th>Description</th>
    <th>P.U HT</th>
    <th>Taux de TVA</th>
    <th>Catégorie</th>";
if (count($tableProduit) > 0) {
    // On affiche chaque entrée une à une :
    foreach ($tableProduit as $enregProduit) {
        echo "<tr> 
            <td>$enregProduit[nom] </td>
            <td>$enregProduit[description]</td>
            <td>$enregProduit[PUHT]</td>
            <td>$enregProduit[TxTVA]</td>
            <td>$enregProduit[nom_categorie]</td>
            <td>
                <form action='afficher1Produit.php'>
                    <input type='hidden' name='idProduit' value='$enregProduit[id]'>
                    <button type='submit'>Ouvrir</button>
                </form>
            </td>
            
            " ; // Pour chaque entrée, j'affiche la dénominiation dans un lien ouvrant la liste des informations de l'entreprise
        echo "<tr>";
    }
    echo "</table>";

}

else
{
echo " Pas encore d'enregistrement ";
}