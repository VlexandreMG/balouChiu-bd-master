<?php 
include('../function/fonction.php');

lienDeptEmp();

$Nom = $_POST['nom'];
$ageMin = $_POST['ageMin'];
$ageMax = $_POST['ageMax'];
$dep_no = $_POST['departement'];

$liste = recherche($Nom,$ageMin,$ageMax,$dep_no);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border = 1px>
        <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Anniversaire</th>
        <th>Genre</th>
        </tr>
    <?php 
         foreach($liste as $lt)
         { ?>
         <tr>
             <td><?php echo $lt['nom']; ?></td>
             <td><?php echo $lt['prenom']; ?></td>
             <td><?php echo $lt['anniversaire']; ?></td>
             <td><?php echo $lt['genre']; ?></td>
            </tr>  
        <?php }
    ?>
    </table>    
</body>
</html>