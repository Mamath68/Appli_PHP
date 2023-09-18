<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/f0dc5fab26.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/CSS/smartphone.css">
    <link rel="stylesheet" href="public/CSS/tablette.css">
    <link rel="stylesheet" href="public/tarteaucitron/css/tarteaucitron.css">
    <script src="public/tarteaucitron/tarteaucitron.js"></script>
    <title>
        <?= $title ?>
    </title>
</head>
<?
?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand">Première Appli PHP - Version SQL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?ctrl=home&action=index">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ctrl=Boutique&action=addProductForm">Ajouter un Produit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ctrl=Boutique&action=TicketCaisse">Ticket de Caisse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?= $contenu ?>
    </main>

    <footer class="text-center text-white">
        <div class="container p-4 pb-0">
            <section>
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3"> © Première Appli PHP - Version SQL Object</span>
                </p>
            </section>
        </div>
        <div class="text-center p-3 footer">
            <a class="text-white" href="index.php?ctrl=home&action=about" target="_blank">A
                Propos</a>
        </div>
    </footer>


    <script src="public/js/script.js"></script>
    <script src="public/js/tarteaucitron.js"></script>
    <script src="public/tarteaucitron/advertising.js"></script>
    <script src="public/tarteaucitron/tarteaucitron.services.js"></script>
    <script src="public/tarteaucitron/lang/tarteaucitron.de.js"></script>
</body>

</html>