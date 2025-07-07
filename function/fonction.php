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

    function lienDeptEmp()
    {
        $base = connexion();

        $prompt = 
        "CREATE OR REPLACE VIEW v_lienDepEmp AS 
        SELECT e.first_name nom , e.last_name prenom , e.birth_date anniversaire , e.gender genre,
        d.dept_no dept_no, d.dept_name dept_name  
        FROM employees  e
        JOIN dept_emp dep ON e.emp_no = dep.emp_no
        JOIN departments d ON dep.dept_no = d.dept_no";

        $result = mysqli_query($base,$prompt);
    }

    function recherche($name,$ageMin,$ageMax,$dept_no)
    {
        $base = connexion();
        
        $prompt =
        "SELECT * from v_lienDepEmp
        WHERE (nom = '%s' OR prenom = '%s')
        AND   (TIMESTAMPDIFF(YEAR,anniversaire,NOW()) BETWEEN %s AND %s)
        AND   dept_no = '%s' "; 

        $prompt = sprintf($prompt,$name,$name,$ageMin,$ageMax,$dept_no);

        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour[] = $retour1;
        }

        return $retour;

    }

?>