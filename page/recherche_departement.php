<?php 
include('../function/fonction.php');
$dept = getDepartement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="result_recherche.php" method="post">
        <select name="departement">
            <?php foreach ($dept as $dep) { ?>
                <option value="<?php echo $dep['dept_no'] ?>"><?php echo $dep['dept_name'] ?></option>
            <?php } ?>            
        </select>

        <input type="text" name="nom">
        <input type="number" name="ageMin">
        <input type="number" name="ageMax">
        <input type="submit" value="Recherche">
    </form>

</body>
</html>