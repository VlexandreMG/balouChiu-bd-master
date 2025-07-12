<?php 
include('../function/fonction.php');
$title = getTitles_by_gender_and_salaries();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques par emploi</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 25px;
            margin-top: 30px;
        }
        .table-title {
            color: #2c3e50;
            margin-bottom: 25px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-container">
                    <h2 class="table-title text-center">Statistiques des emplois</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">Emploi</th>
                                    <th class="text-center">Nombre d'employés</th>
                                    <th class="text-center">Salaire moyen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($title as $tit) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($tit['titre']) ?></td>
                                        <td class="text-center"><?php echo $tit['Nbemployees'] ?></td>
                                        <td class="text-end"><?php echo number_format($tit['salaire'], 2) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <a href="liste_departement.php" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Retour à la liste
                </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>