<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Client</title>
</head>
<body>

    <form action="modif_client.php" method="post">
        <fieldset>
            <legend><b>Saisissez votre identifiant client pour modifier vos coordonnées</b></legend>

            <table>
                <tr><td>Code client :</td><td><input type="text" name="id_client" size="20" maxlength="10"></td></tr>

                <tr>
                    <td><input type="submit" value="Modifier" name="modiferClient"></td>
                </tr>

            </table>
        </fieldset>
    </form>
    
</body>
</html>
