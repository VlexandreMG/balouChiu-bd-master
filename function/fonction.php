<?php
    require("connexion.php");

    function getNomDepartement($dept_no)
    {
        $base = connexion();
        $prompt = "SELECT dept_name FROM departments WHERE dept_no = '%s'";
        $prompt = sprintf($prompt,$dept_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while ($retour1 = mysqli_fetch_assoc($result)) 
        {
            $retour = $retour1;
        }

        return $retour["dept_name"];
    }

    function getDepartement()
    {
        $base = connexion();
        $prompt = "SELECT * FROM departments ORDER BY dept_name ASC";
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
        WHERE dept_emp.dept_no = '%s' ORDER BY nom,prenom ASC";
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

    function getHistoriqueSalaries($emp_no)
    {
        $base = connexion();
        $prompt = "SELECT * FROM salaries WHERE emp_no = '%s'";
        $prompt = sprintf($prompt,$emp_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour[] = $retour1;
        }

        return $retour;
    }

    function getHistoriqueTitre($emp_no)
    {
        $base = connexion();
        $prompt = "SELECT * FROM titles WHERE emp_no = '%s'";
        $prompt = sprintf($prompt,$emp_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour[] = $retour1;
        }

        return $retour;
    }

    function formulaire_De_Recherche($departement,$nomEmployer,$ageMin,$ageMax)
    {
        $base = connexion();
        $prompt = "SELECT * FROM employees JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
        WHERE dept_emp.dept_no = '%s' AND (employees.first_name = '%s' OR employees.last_name = '%s') AND
        (SELECT TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) from employees WHERE emp_no = '%s' ) >= '%s' 
        AND (SELECT TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) from employees WHERE emp_no = '%s') <= '%s'";
        $prompt = sprintf($prompt,$departement,$nomEmployer,$nomEmployer,$ageMin,$ageMax);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour[] = $retour1;
        }

        return $retour;
    }

?>