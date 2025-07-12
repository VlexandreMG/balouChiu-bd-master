<?php 
include('../function/fonction.php');
$dept = getDepartement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche par département</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Recherche d'employés</h3>
                    </div>
                    <div class="card-body">
                        <form action="result_recherche.php" method="post">
                            <div class="mb-3">
                                <label for="departement" class="form-label">Département</label>
                                <select class="form-select" name="departement" id="departement" required>
                                    <?php foreach ($dept as $dep) { ?>
                                        <option value="<?php echo $dep['dept_no'] ?>"><?php echo $dep['dept_name'] ?></option>
                                    <?php } ?>            
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez un nom">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ageMin" class="form-label">Âge minimum</label>
                                    <input type="number" class="form-control" name="ageMin" id="ageMin" min="0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ageMax" class="form-label">Âge maximum</label>
                                    <input type="number" class="form-control" name="ageMax" id="ageMax" min="0">
                                </div>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>