<?php
    require("connexion.php");

    function getDepartement()
    {
        $base = connexion();
        $prompt = "SELECT * FROM departments";
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while ($retour1 = mysqli_fetch_assoc($result)) 
        {
            $retour[] = $retour1;
        }

        return $retour;
    }

    function getManager($dpt_no)
    {
        $base = connexion();
        $prompt = "SELECT employees.first_name as nom, employees.last_name as prenom  FROM employees JOIN dept_manager ON employees.emp_no = dept_manager.emp_no  WHERE 
        dept_manager.dept_no = '%s' AND dept_manager.from_date <= NOW() AND dept_manager.to_date >= NOW()";
        $prompt = sprintf($prompt,$dpt_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour = $retour1;
        }

        return $retour;
    }

    function getEmployees($dpt_no)
    {
        $base = connexion();
        $prompt = "SELECT employees.emp_no , employees.first_name as nom, employees.last_name as prenom FROM employees JOIN dept_emp ON dept_emp.emp_no = employees.emp_no 
        WHERE dept_emp.dept_no = '%s'";
        $prompt = sprintf($prompt,$dpt_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour[] = $retour1;
        }

        return $retour;
    } 

    function getFicheEmployer($emp_no)
    {
        $base = connexion();
        $prompt = "SELECT * FROM employees WHERE emp_no = '%s'";
        $prompt = sprintf($prompt,$emp_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour = $retour1;
        }

        return $retour;
    }
<<<<<<< HEAD
=======

>>>>>>> 8081a383bb0cc16d8fad3b7aa4597a67819deddf
?>