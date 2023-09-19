<?php
$boutiques = $result['data']['boutique'];

?>
<?php
$totalGeneral = 0;
if (isset($boutiques)) {
?>
    <table class='table'>
        <thead>
            <tr class="table-dark">
                <th scope='col'> Nom </th>
                <th scope='col'> Prix </th>
                <th scope='col'> Quantité </th>
                <th scope='col'> Total </th>
                <th scope='col'> </th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($boutiques as $boutique) {
            ?>
                <tr class="table-secondary">
                    <td class="table-dark text-center"><?= $boutique->getName() ?></td>
                    <td class="table-secondary text-center"><?= number_format($boutique->getPrice(), 2, ",", "&nbsp;") ?> &nbsp;€</td>
                    <td class="table-secondary text-center"><?= $boutique->getQuantity() ?></td>
                    <td class="table-secondary text-center"><?= number_format($boutique->getTotal(), 2, ",", "&nbsp;") ?>&nbsp;€ </td>
                    <td class="text-center table-secondary trio">
                        <a class='btn btn-primary' href='index.php?ctrl=boutique&action=augmenter&id=<?= $boutique->getId() ?>' role='button'>Augmenter</a>
                        <a class='btn btn-primary' href='index.php?ctrl=boutique&action=reduire&id=<?= $boutique->getId() ?>' role='button'>Reduire</a>
                        <a class='btn btn-primary' href='index.php?ctrl=boutique&action=deleteOne&id=<?= $boutique->getId() ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php
                $totalGeneral += $boutique->getTotal();
            }
            ?>

            <tr class="table-secondary">
                <td class="table-secondary" colspan=4>Total Général : </td>
                <td class="table-secondary"><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?> &nbsp;€</strong></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary separate" href="index.php?ctrl=boutique&action=deleteAll" role="button">Vider le Pannier</a>
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