    <?php
    include("header.php");
    session_start();
    ?>

<body>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=addProduct" method="post">
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
                    <input type="number" step="any" name="price" min="0" class="form-control" value="0">
                </label>
            </p>
        </div>
        <div class="mb-3">
            <p>
                <label class="form-label">
                    Quantité désirée
                    <input type="number" name="qtt" class="form-control" min="0" value="0">
                </label>
            </p>
            <p>
                <label class="form-label">
                    <input type="submit" name="submit" class="btn btn-primary" value="Ajouter le produit">
                </label>
            </p>
        </div>
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    </form>
    <?php
    $totalqtt = 0;
    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $index => $product) {
            $totalqtt += $product["qtt"];
        }
    }
    echo
        '<div class="container text-center bg-success">
  <div class="row">
    <div class="col">
    Total Général :
    </div>
    <div class="col">
    Il y a <strong>' . $totalqtt . '</strong> Produits enregistré
    </div>
  </div>
  </div>'
        ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>