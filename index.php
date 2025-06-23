<?php 
    include("function/fonction.php");

    $essai = "NOW()";
    $test = getManager($essai);

    foreach($test as $List)
    {
        echo $List["first_name"]," ",$List["last_name"],"<br>";
    }
?>
