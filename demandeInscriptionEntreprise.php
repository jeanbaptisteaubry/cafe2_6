<html>
    <head>
        <title>
            Une page
        </title>
    </head>
    <body>
        <H1>Demande d'inscription d'une entreprise</H1>
        <table>
        <form action="reponseInscriptionEntreprise.php" method="GET">
           <tr> <td> Dénomination sociale </td><td> <input type="text" name="denominationSociale"></td></tr>
            <tr> <td> Raison sociale </td><td> <input type="text" name="raisonSociale"></td></tr>
            <tr> <td>  Adresse</td> <td> <input type="text" name="Adresse"></td></tr>
            <tr>  <td>  CP </td><td> <input type="text" name="CP"></td></tr>
            <tr>  <td>   Ville </td><td> <input type="text" name="Ville"><br></tr>
            <tr>  <td>    Mail contact</td> <td> <input type="email" name="mailContact"></td></tr>
            <tr>    <td>   <input type="submit" name="button_envoyer" value ="Envoyer"></td></tr>
        </form>
        </table>
    </body>
</html>
