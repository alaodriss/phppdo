<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperation des donnees</title>
</head>
<body>
    

    <?php 

      /* conx with database  */
      $bdpdo= new PDO('mysql:host=localhost; dbname=webtoup','root',"");
      $bdpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   

      $requete = "SELECT * FROM clients ORDER BY id ASC";
      $result = $bdpdo->query($requete);

      if(!$result){
        echo "La recuperation des donnees a rencontre un problem";
      }else{
             $nbre_clients = $result->rowCount();
             
    ?>

    <h3> Tous nos Clients</h3>
    <h4> il y a <?=$nbre_clients?></h4>
    <table>
        <tr>
            <th>Numero de client</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Email</th>
        </tr>
        <?php 

      /* recupere lien part lien avec fetch  */
        while($ligne = $result->fetch(PDO::FETCH_NUM)){
            echo "<tr>";
            foreach ($ligne as $valeur){
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        
        ?>
    </table>
    <?php 
        $result->closeCursor();
     }
    ?>
</body>
</html>