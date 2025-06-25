<?php 
include("../function/fonction.php");
$post = $_POST['emp_no'];
$fiche = getFicheEmployer($post);
$historique = getHistoriqueTitre($post);
$salaire = getHistoriqueSalaries($post);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fiche d'employée : </h1>
    <p>Nom : <?php echo $fiche['first_name'] ?></p>
    <p>Prenom : <?php echo $fiche['last_name'] ?></p>
    <p>Gendre : <?php echo $fiche['gender'] ?></p>
    <p>Date de naissance : <?php echo $fiche['birth_date'] ?></p>
    <p>Date d'embauche : <?php echo $fiche['hire_date'] ?></p>

    <table border=1px>
        <tr>
            <th>Salaires </th>
            <th>From date </th>
            <th>To date</th>
        </tr>
    <?php 
    foreach ($salaire as $sal) { ?>
    
        <tr>
            <td><?php echo $sal['salary'] ?></td>
            <td><?php echo $sal['from_date'] ?></td>
            <td><?php echo $sal['to_date'] ?></td>
        </tr>
    <?php }
    ?>
    </table>

    <table border=1px>
        <tr>
            <th>Titres</th>
            <th>From date</th>
            <th>To date</th>
        </tr>
    <?php 
    foreach ($historique as $his) { ?>
    
        <tr>
            <td><?php echo $his['title'] ?></td>
            <td><?php echo $his['from_date']?></td>
            <td><?php echo $his['to_date']?></td>
        </tr>
    <?php }
    ?>
    </table>
    
</body>
</html>




            
