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

    // function getAge($emp_name){
    //     $base = connexion();
    //     $prompt = "SELECT TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) as age from employees WHERE first_name = 'Aamer'";
    //     $prompt = sprintf($prompt,$emp_name,$emp_name);
    //     $result = mysqli_query($base,$prompt);

    //     $resultat = mysqli_fetch_assoc($result);

    //     return $resultat;
    // }

    // function formulaireRecherche($emp_name,$dept_no,$ageMin,$ageMax) {

    //     $ami = getAge($emp_name);
    //     $base = connexion();
    //     if($ami >= $ageMin && $ami <= $ageMax) {
    //         $prompt = "SELECT * FROM employees 
    //         JOIN dept_emp ON employees.emp_no = dept_emp.emp_no AND
    //         (employees.first_name LIKE '%%s%' OR employees.last_name LIKE '%%s%')";
            
    //         $prompt = sprintf($prompt,$emp_name,$emp_name);
    //         $result = mysqli_query($base,$prompt);

    //         $retour = array();

    //         while($retour1 = mysqli_fetch_assoc($result))
    //         {
    //             $retour[] = $retour1;
    //         }
            
    //         return $retour;
    //     }
    //     return null;
        
    // }

    function formulaireRecherche($dept_name,$emp_name,$ageMin,$ageMax) {
        $base = connexion();

        $dept_name = '%' . $dept_name . '%';
        $emp_name = '%' . $emp_name . '%';

        $prompt = "SELECT * FROM employees 
        JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
        JOIN departments ON departments.dept_no = dept_emp.dept_no
        WHERE departments.dept_name LIKE '%s' 
        AND employees.first_name LIKE '%s' 
        AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN %s AND %s";
        $prompt = sprintf($prompt, $dept_name, $emp_name, $ageMin, $ageMax);

        $resultat = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($resultat))
        {
            $retour[] = $retour1;
        }
            
        return $retour;
    }
?>