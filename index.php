<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Ajout Produit</title>
</head>

<body>
    <?php
include("header.php");
    ?>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        <div class="mb-3">
            <p>
                <label class="form-label">
                    Nom du produit
                    <input type="text" name="name" class="form-control">
                </label>
            </p>
        </div>
        <div class="mb-3">
            <p>
                <label class="form-label">
                    Prix du produit
                    <input type="number" step="any" name="price" class="form-control">
                </label>
            </p>
        </div>
        <div class="mb-3">
            <p>
                <label class="form-label">
                    Quantité désirée
                    <input type="number" name="qtt" class="form-control" value="1">
                </label>
            </p>
            <p>
                <label class="form-label">
                    <input type="submit" name="submit" class="btn btn-primary" value="Ajouter le produit">
                </label>
            </p>
        </div>
    </form>
</body>
</html>