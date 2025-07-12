<?php 
ini_set("display_errors","1");
include("function/fonction.php");
lienDeptEmp();
EmployeeDepCurrent();

header('Location: page/liste_departement.php');
?>
