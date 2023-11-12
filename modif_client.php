<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des infos d'un client</title>
</head>
<body>

<?php
if (empty($_POST['id_client'])) {
    header('Location: form_modif_client.php');
}

$bdpdo = new PDO('mysql:host=localhost; dbname=webtoup', 'root', "");
$bdpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!isset($_POST['modif'])) {

    $id_clt = $_POST['id_client'];
    $requete = "SELECT * FROM clients WHERE id='$id_clt'";

    $result = $bdpdo->query($requete);

    /**récupérer une table associative */
    $data = $result->fetch(PDO::FETCH_ASSOC);

    ?>
    <form action="modif_client.php" method="post">
        <fieldset>
            <legend><b>Modifier vos coordonnées</b></legend>

            <table>
                <tr><td>Nom :</td><td><input type="text" name="nom" size="60" value="<?= $data['nom'] ?>"></td></tr>
                <tr><td>Prénom :</td><td><input type="text" name="prenom" size="60" value="<?= $data['prenom'] ?>"></td></tr>
                <tr><td>Âge :</td><td><input type="number" name="age" size="60" value="<?= $data['age'] ?>"></td></tr>
                <tr><td>Adresse :</td><td><input type="text" name="adresse" size="60" value="<?= $data['adresse'] ?>"></td></tr>
                <tr><td>Ville :</td><td><input type="text" name="ville" size="60" value="<?= $data['ville'] ?>"></td></tr>
                <tr><td>Email :</td><td><input type="email" name="email" size="60" value="<?= $data['email'] ?>"></td></tr>

                <tr>
                    <td><input type="reset" value="Effacer"></td>
                    <td><input type="submit" name="modif" value="Enregistrer"></td>
                </tr>

            </table>
        </fieldset>

        <!-- This input for updating client data via each id -->
        <input type="hidden" name="id_client" value="<?= $id_clt ?>">

    </form>

    <?php
    $result->closeCursor();

} elseif(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['email'])){
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $age = $_POST['age'];
   $adresse = $_POST['adresse'];
   $ville = $_POST['ville'];
   $email = $_POST['email'];

   $id_clt = $_POST['id_client'];

   $requete = $bdpdo->prepare("UPDATE clients SET nom=:nom, prenom=:prenom, age=:age, adresse=:adresse, ville=:ville, email=:email WHERE id=:id_client");

   $requete->bindValue(':nom', $nom);
   $requete->bindValue(':prenom', $prenom);
   $requete->bindValue(':age', $age);
   $requete->bindValue(':adresse', $adresse);
   $requete->bindValue(':ville', $ville);
   $requete->bindValue(':email', $email);
   $requete->bindValue(':id_client', $id_clt);

   $result = $requete->execute();

   if(!$result){
    echo "Un problème est survenu";
   } else {
    echo "Vos modifications ont bien été effectuées";
   }
   
} else {
    echo "Modification non correcte";
}
?>

</body>
</html>
