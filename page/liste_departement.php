<?php 
include("../function/fonction.php");

$dept = getDepartement();
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
     
    <table border = 1px>
        <tr>
            <th>Nom departements</th>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
        
        <?php 
     foreach ($dept as $dp) 
<<<<<<< HEAD
     { ?>
     <tr>
        <td><?php echo $dp["dept_name"]; ?></td>
        <td><?php $test = getManager($dp["dept_no"]); echo $test["first_name"]?></td>
     </tr> 
     <?php } ?>
        
    </table>
    
=======
     {
        echo $dp["dept_name"];
     }

    $essai = "d001";
    $test = getManager($essai);

    foreach($test as $List)
    {
        echo $List["first_name"]," ",$List["last_name"],"<br>";
    }
    ?>
>>>>>>> 77729c3064eda1b5daa0c90349b72ba25d937078
</body>
</html>