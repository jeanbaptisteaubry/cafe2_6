<?php
echo "<H1>Fiche d'information d'entreprise</H1>";
//echo "entreprise demandée : ".$_REQUEST["id"]."<br>";

//Etablissement d'une liaison à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');


if(isset($_REQUEST["action"]))
{
    if($_REQUEST["action"] == "MAJ_PRODUIT" )
    {
        $reqTxt = "
        UPDATE `entreprise` 
        SET  `denominationSociale`= :denominationSociale,
             `raisonSociale`= :raisonSociale,
             `Adresse`= :Adresse,
             `CP`= :CP,
             `Ville`= :Ville,
             `mailContact`= :mailContact
        WHERE `id` = :id";

//Paramétrage de la requête
        $reqBDD = $bdd->prepare($reqTxt);
        $etat = $reqBDD->execute(array(
            'id' => $_REQUEST["id"],
            'denominationSociale' => $_REQUEST["denominationSociale"],
            'raisonSociale' => $_REQUEST["raisonSociale"],
            'Adresse' => $_REQUEST["Adresse"],
            'CP' => $_REQUEST["CP"],
            'Ville' => $_REQUEST["Ville"],
            'mailContact' => $_REQUEST["mailContact"],

        ));

        if($etat == false)
        {
            die ("Catastrophe !!");
        }
    }
}

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
echo " 
 <form>
    <input type='hidden' value='$entreprise[id]' name='id'>
   <table border='1' style='border-style: double;'>
      <tr>      
            <td> denominationSociale </td>
            <td> <input type='text' value='$entreprise[denominationSociale]' name='denominationSociale'> </td>
      </tr>
      <tr>      
            <td> raisonSociale </td>
            <td>  <input type='text' value='$entreprise[raisonSociale]' name='raisonSociale'>   </td>
      </tr>
      <tr>      
            <td> Adresse </td>
            <td><input type='text' value='$entreprise[Adresse]' name='Adresse'>   </td>
      </tr>
      <tr>      
            <td> CP </td>
            <td><input type='text' value='$entreprise[CP]' name='CP'> </td>
      </tr>
      <tr>      
            <td> Ville </td>
            <td><input type='text' value='$entreprise[Ville]' name='Ville'>  </td>
      </tr>
      <tr>      
            <td> mailContact </td>
            <td><input type='email' value='$entreprise[mailContact]' name='mailContact'>  </td>
      </tr>
      <tr>      
            <td> <button type='submit' name='action' value='MAJ_PRODUIT'>M.A.J</button> </td>
      </tr>
   </table>
</form>
";
