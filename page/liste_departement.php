<?php 
include("../function/fonction.php");

$dept = getDepartement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste dept</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h1 class="h4 mb-0">Liste des noms des départements et des managers</h1>
                
                <button class="btn btn-link text-white p-0" onclick="window.location.href='recherche_departement.php'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Départements</th>
                                <th>Managers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dept as $dp) { ?>
                            <tr>
                                <td>
                                    <a href="liste_employeeDept.php?dept_no=<?php echo $dp["dept_no"] ?>" 
                                       class="text-decoration-none">
                                        <?php echo $dp["dept_name"];?>
                                    </a>
                                </td>
                                <td><?php echo getManager($dp["dept_no"])['nom'] ," ", getManager($dp["dept_no"])['prenom']  ?></td>
                            </tr> 
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <?php echo count($dept) ?> départements trouvés
            </div>
        </div>
    </div>
</body>
</html>