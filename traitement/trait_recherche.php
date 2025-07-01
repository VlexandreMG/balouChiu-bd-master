<?php 
include('../function/fonction.php');

$dept = $_POST['departement'];
$name = $_POST['nom'];
$ageMin = $_POST['ageMin'];
$ageMax = $_POST['ageMax'];

$test = formulaireRecherche($dept,$name,$ageMin,$ageMax);
//var_dump($test);
foreach ($test as $key) {
    echo $key['first_name'];
}
?>