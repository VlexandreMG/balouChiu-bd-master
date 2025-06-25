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
        $prompt = "SELECT employees.first_name , employees.last_name FROM employees JOIN dept_manager ON employees.emp_no = dept_manager.emp_no  WHERE 
        dept_manager.dept_no = '%s' AND dept_manager.from_date <= NOW() AND dept_manager.to_date >= NOW()";
        $prompt = sprintf($prompt,$dpt_no);
        $result = mysqli_query($base,$prompt);

        $retour = array();

        while($retour1 = mysqli_fetch_assoc($result))
        {
            $retour[] = $retour1;
        }

        return $retour;
    }
?>