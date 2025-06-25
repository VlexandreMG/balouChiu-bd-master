<?php 
include("../function/fonction.php");
$post = $_POST['emp_no'];
$fiche = getFicheEmployer($post);
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
</body>
</html>