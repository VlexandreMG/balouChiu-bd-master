<?php 
include('../function/fonction.php');

lienDeptEmp();

$Nom = $_POST['nom'];
$ageMin = $_POST['ageMin'];
$ageMax = $_POST['ageMax'];
$dep_no = $_POST['departement'];

$liste = recherche($Nom,$ageMin,$ageMax,$dep_no);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Résultats de la recherche</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Anniversaire</th>
                                        <th>Genre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($liste as $lt) { ?>
                                    <tr>
                                        <td><?php echo $lt['nom']; ?></td>
                                        <td><?php echo $lt['prenom']; ?></td>
                                        <td><?php echo $lt['anniversaire']; ?></td>
                                        <td><?php echo $lt['genre']; ?></td>
                                    </tr>  
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="recherche_departement.php" class="btn btn-secondary">Nouvelle recherche</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>