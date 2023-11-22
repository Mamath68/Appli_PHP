<?php
$boutiques = $result['data']['boutique'];

?>
<?php
$totalGeneral = 0;
if (isset($boutiques)) {
?>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col' class="table-dark"> Nom </th>
                <th scope='col' class="table-dark"> Prix </th>
                <th scope='col' class="table-dark"> Quantité </th>
                <th scope='col' class="table-dark"> Total </th>
                <th scope='col' class="table-dark"> </th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($boutiques as $boutique) {
            ?>
                <tr>
                    <td class="table-dark"><?= $boutique->getName() ?></td>
                    <td class="table-secondary"><?= number_format($boutique->getPrice(), 2, ",", "&nbsp;") ?> &nbsp;€</td>
                    <td class="table-secondary"><?= $boutique->getQuantity() ?></td>
                    <td class="table-secondary"><?= number_format($boutique->getTotal(), 2, ",", "&nbsp;") ?>&nbsp;€ </td>
                    <td class="table-secondary trio">
                        <a class='btn btn-primary' href='index.php?ctrl=boutique&action=augmenter&id=<?= $boutique->getId() ?>' role='button'>Augmenter</a>
                        <a class='btn btn-primary' href='index.php?ctrl=boutique&action=reduire&id=<?= $boutique->getId() ?>' role='button'>Reduire</a>
                        <a class='btn btn-primary' href='index.php?ctrl=boutique&action=deleteOne&id=<?= $boutique->getId() ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php
                $totalprice += $boutique->getPrice();
                $totalquantity += $boutique->getQuantity();
                $totalGeneral += $boutique->getTotal();
            }
            ?>

            <tr>
                <td class="table-dark">Total Général : </td>
                <td class="table-dark"> <strong><?= number_format($totalprice, 2, ",", "&nbsp;") ?> &nbsp;€</strong></td>
                <td class="table-dark"><strong><?= $totalquantity ?></strong></td>
                <td class="table-dark"><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?> &nbsp;€</strong></td>
                <td class="table-dark"> <a class="btn btn-primary" href="index.php?ctrl=boutique&action=deleteAll" role="button">Vider le Pannier</a>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <h2><?= $_SESSION['message'] ?></h2>
    <?php
        unset($_SESSION['message']);
    }
    ?>
<?php
} else {
?>
    <h2>Aucun produit en Session...</h2>
<?php
}
?>

<?= $title = "Ticket de Caisse" ?>