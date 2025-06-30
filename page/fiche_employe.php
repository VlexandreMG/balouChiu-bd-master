<?php 
include("../function/fonction.php");
$post = $_POST['emp_no'];
$fiche = getFicheEmployer($post);
$historique = getHistoriqueTitre($post);
$salaire = getHistoriqueSalaries($post);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Fiche employé</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Fiche employé</h1>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h3>Informations personnelles</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nom :</strong> <?php echo $fiche['last_name'] ?></li>
                            <li class="list-group-item"><strong>Prénom :</strong> <?php echo $fiche['first_name'] ?></li>
                            <li class="list-group-item"><strong>Genre :</strong> <?php echo $fiche['gender'] ?></li>
                            <li class="list-group-item"><strong>Date de naissance :</strong> <?php echo $fiche['birth_date'] ?></li>
                            <li class="list-group-item"><strong>Date d'embauche :</strong> <?php echo $fiche['hire_date'] ?></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h3>Historique des salaires</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Salaire</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($salaire as $sal) { ?>
                                    <tr>
                                        <td><?php echo $sal['salary'] ?></td>
                                        <td><?php echo $sal['from_date'] ?></td>
                                        <td><?php echo $sal['to_date'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3>Historique des titres</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Titre</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($historique as $his) { ?>
                                    <tr>
                                        <td><?php echo $his['title'] ?></td>
                                        <td><?php echo $his['from_date']?></td>
                                        <td><?php if ($his['to_date'] <= date('Y-m-d')) {
                                            echo $his['to_date']?></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="liste_employeeDept.php?dept_no=<?php echo $fiche['dept_no'] ?? '' ?>" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</body>
</html>