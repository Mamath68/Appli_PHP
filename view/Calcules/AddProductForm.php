<?php
$boutiques = $result["data"]['boutiques'];
?>
<h1>Ajouter un produit</h1>
<form action="index.php?ctrl=boutique&action=addProduct" method="post">
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
                <input type="number" name="quantity" class="form-control" min="0" max="999" value="0">
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
foreach ($boutiques as $boutique) {
        $totalqtt += $boutique->getQuantity();
}
?>
<div class="container text-center bg-primary">
    <div class="row">
        <div class="col">
            Total Général :
        </div>
        <div class="col">
            Il y a <strong><?= $totalqtt ?> </strong> Produits enregistré
        </div>
    </div>
</div>

<?= $title = "Formulaire D'ajout de Produit" ?>