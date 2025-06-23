<?php 
include("function/fonction.php");
// $dept = getDepartement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste dept</title>
</head>
<body>
    <h1>Nom de tous les départements :</h1><br> 
    <?php 
    // foreach ($dept as $dp) {
        // echo $dp["dept_name"];
    // }

    $essai = "NOW()";
    $test = getManager($essai);

    foreach($test as $List)
    {
        echo $List["first_name"]," ",$List["last_name"],"<br>";
    }
    ?>
</body>
</html>