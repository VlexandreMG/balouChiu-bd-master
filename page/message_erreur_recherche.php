<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur de formulaire</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .error-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .error-card {
            max-width: 600px;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .error-icon {
            font-size: 5rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="card error-card text-center p-4">
            <div class="card-body">
                <div class="error-icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <h1 class="card-title h3 mb-3">Formulaire incomplet</h1>
                <p class="card-text mb-4">Veuillez remplir tous les champs obligatoires du formulaire avant de soumettre votre recherche.</p>
                <a href="recherche_departement.php" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Retour au formulaire
                </a>
            </div>
        </div>
    </div>

</body>
</html>