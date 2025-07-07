<?php 
include('../function/fonction.php');

    lienDeptEmp();

$Nom = $_POST['nom'];
$ageMin = $_POST['ageMin'];
$ageMax = $_POST['ageMax'];
$dep_no = $_POST['departement'];

$liste = recherche($Nom,$ageMin,$ageMax,$dep_no);

foreach($liste as $lt)
{
    echo $lt['nom'] ;
}

?>