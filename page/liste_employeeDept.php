<?php
include("../function/fonction.php");
$dept_no = $_GET["dept_no"];
$listEmp = getEmployees($dept_no);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des employees par départements :</h1>
    <table border=1px >
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
    <?php 
    foreach ($listEmp as $ls) { ?>
        <tr>
            <td><?php echo $ls['nom'] ?></td>
            <td><?php echo $ls['prenom'] ?></td>
        </tr>
    <?php } ?>
    </table>
    
</body>
</html>