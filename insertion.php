<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save des donnees</title>
</head>
<body>

    <?php
        /* conx with database  */
        $bdpdo= new PDO('mysql:host=localhost; dbname=webtoup','root',"");
        $bdpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* to Get all info  */
        if(isset($_POST['enregister'])){

            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $age = $_POST["age"];
            $adresse = $_POST["adresse"];
            $ville = $_POST["ville"];    
            $email = $_POST["email"];

            /* for check if vide or not */
            if(!empty($nom) && !empty($prenom) && !empty($age) && !empty($adresse) && !empty($ville) && !empty($email)){

                /* les requetes prepare */
                $requete = $bdpdo->prepare('INSERT INTO clients(nom, prenom, age, adresse, ville, email) VALUES(:nom, :prenom, :age, :adresse, :ville, :email)');
                
                /* fait la lisaon entre les deuxs */
                 /* les requetes nommee */
                $requete->bindValue(':nom', $nom);
                $requete->bindValue(':prenom', $prenom);
                $requete->bindValue(':age', $age);
                $requete->bindValue(':adresse', $adresse);
                $requete->bindValue(':ville', $ville);
                $requete->bindValue(':email', $email);

                $result = $requete->execute();

                if(!$result){
                    echo "problem in save";
                }else{
                    $lastInsertedId = $bdpdo->lastInsertId();
                    echo "<script>
                    alert('Vous êtes bien enregistré. Votre identifiant est : " . utf8_encode($lastInsertedId) . "');
                  </script>";
                }
            }else{
                echo "tous les champs sont requis";
            }
        }
    ?>

    <form action="insertion.php" method="post">

    <fieldset>
        <legend><b> Vos coordonnées</b></legend>

        <table>
            <tr><td>Nom :</td><td><input type="text" name="nom" size="50" maxlength="100"></td></tr>
            <tr><td>Prenom :</td><td><input type="text" name="prenom" size="50" maxlength="100"></td></tr>
            <tr><td>Age :</td><td><input type="number" name="age" maxlength="3"></td></tr>
            <tr><td>Adresse :</td><td><input type="text" name="adresse" size="50" maxlength="100"></td></tr>
            <tr><td>Ville :</td><td><input type="text" name="ville" size="50" maxlength="100"></td></tr>
            <tr><td>Email :</td><td><input type="email" name="email" size="50" maxlength="50"></td></tr>

            <tr>
               <td> <input type="reset" name="effacer" value="Effacer"></td>
               <td> <input type="submit" name="enregister" value="enregister"></td>
            </tr>

        </table>
    </fieldset>

    </form>
    
</body>
</html>
