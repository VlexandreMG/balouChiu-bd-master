<?php 
ini_set("display_errors","1");
include("function/fonction.php");
lienDeptEmp();
EmployeeDepCurrent();
NbEmployee();

header('Location: page/liste_departement.php');
?>
