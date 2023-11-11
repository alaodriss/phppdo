<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>from modife client</title>
</head>
<body>

    <from action="modif_client.php" method="post">
        <fieldset>
            <legend> <b> Saisissez votre identifiant client pour modifer vos coordonées<b></legend>

            <table>
            <tr><td>Code client :</td><td><input type="number" name="nom" size="10" maxlength="10"></td></tr>

            <tr>
               <td><input type="submit" value="Modifier"></td>
            </tr>

        </table>
        </fieldset>

    </from>
    
</body>
</html>