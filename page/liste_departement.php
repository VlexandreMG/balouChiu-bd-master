<?php 
include("../function/fonction.php");

$dept = getDepartement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste dept</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Liste des départements</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom département</th>
                                <th>Nom</th>
                                <th>Prénom</th>
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
                                <td><?php echo getManager($dp["dept_no"])['nom'] ?></td>
                                <td><?php echo getManager($dp["dept_no"])['prenom'] ?></td>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>