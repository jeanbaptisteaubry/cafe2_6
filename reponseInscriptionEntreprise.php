<?php

if(isset($_REQUEST["RGPD"])) {
//Association d'une variable PHP à chaque variable issue de la demande (REQUEST) Http
    $denominationSociale = $_REQUEST["denominationSociale"];
    $raisonSociale = $_REQUEST["raisonSociale"];
    $Adresse = $_REQUEST["Adresse"];
    $CP = $_REQUEST["CP"];
    $Ville = $_REQUEST["Ville"];
    $mailContact = $_REQUEST["mailContact"];
    $nomGerant = $_REQUEST["nomGerant"];
    $prenomGerant = $_REQUEST["prenomGerant"];
    $dateNaissanceGerant = $_REQUEST["dateNaissanceGerant"];
    $lieuNaissanceGerant = $_REQUEST["lieuNaissanceGerant"];
    $departementNaissanceGerant = $_REQUEST["departementNaissanceGerant"];


//Etablissement de la connexion à la base de données
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Génération d'une requête SQL
    $reqTxt = "
    INSERT INTO `entreprise`(`denominationSociale`, `raisonSociale`, `Adresse`, `CP`, `Ville`, `mailContact`, `nomGerant`, `prenomGerant`, `dateNaissanceGerant`, `lieuNaissanceGerant`, `departement`, `dateAcceptationRGPD`) 
    VALUES (                :denominationSociale, :raisonSociale,      :Adresse, :CP, :Ville, :mailContact, 
            :nomGerant, :prenomGerant   ,:dateNaissanceGerant , :lieuNaissanceGerant, :departement      ,:dateAcceptationRGPD)";

//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
    $reqBDD = $bdd->prepare($reqTxt);
    $dateAcceptationRGPD = date('Y-m-d H:i:s');
    $etat = $reqBDD->execute(array(
        'denominationSociale' => $denominationSociale,
        'raisonSociale' => $raisonSociale,
        'Adresse' => $Adresse,
        'CP' => $CP,
        'Ville' => $Ville,
        'mailContact' => $mailContact,
        'nomGerant' => $nomGerant,
        'prenomGerant' => $prenomGerant,
        'dateNaissanceGerant' => $dateNaissanceGerant,
        'lieuNaissanceGerant' => $lieuNaissanceGerant,
        'departement' => $departementNaissanceGerant,
        'dateAcceptationRGPD' => $dateAcceptationRGPD,
    ));

    //var_dump($_REQUEST["centre"]);
    //Parcours des centres d'intérêts
    if (isset($_REQUEST["centre"])){
        $idGerant = $bdd->lastInsertId();
        foreach ($_REQUEST["centre"] as $centre) {
            $reqTxt = "INSERT INTO `avoir_centreinteret`(`idCI`, `idEntreprise`) 
            VALUES (:idCI, :idEntreprise)";
//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
            $reqBDD = $bdd->prepare($reqTxt);
            $etat = $reqBDD->execute(array(
                'idCI' => $centre,
                'idEntreprise' => $idGerant,
            ));
        }
    }

//$etat : variable stockant l'issue de la requête

//Affichage du résultat de la requête :
    if ($etat) {
        echo " 
 Bonjour,
 Nous vous remercions pour votre inscription. Nous vous contacterons une fois examen de votre 
 dossier à l'adresse suivant : $mailContact <br>.
 L'équipe Café.com
";
    } else {
        echo 'archtung !!';
    }
}
else
{
    echo 'RGPD pas accepté !';
}











