<?php
include("../function/fonction.php");
$dept_no = $_GET["dept_no"];
$listEmp = getEmployees($dept_no);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Employés par département</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Liste des employés du département</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Fiche</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listEmp as $ls) { ?>
                            <tr>
                                <td><?php echo $ls['nom'] ?></td>
                                <td><?php echo $ls['prenom'] ?></td>
                                <td>
                                    <form action="fiche_employe.php" method="post">
                                        <input type="hidden" name="emp_no" value="<?php echo $ls['emp_no'] ?>">
                                        <button type="submit" class="btn btn-sm btn-info">Voir fiche</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <?php echo count($listEmp) ?> employés trouvés
            </div>
        </div>
    </div>
</body>
</html>