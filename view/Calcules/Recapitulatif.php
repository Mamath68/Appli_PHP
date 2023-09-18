<?php
$boutiques = $result['data']['boutique'];

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
        $totalGeneral = 0;
        foreach ($boutiques as $boutique) {
            if (empty($boutique->getId())) {
        ?>
                <p>Aucun produit en Session...</p>
            <?php
            } else {
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
        }
        ?>
        <tr class="table-secondary">
            <td class="table-secondary" colspan=4>Total Général : </td>
            <td class="table-secondary"><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?> &nbsp;€</strong></td>
        </tr>
    </tbody>
</table>
<a class="btn btn-primary separate" href="index.php?ctrl=boutique&action=deleteAll" role="button">vider panier</a>
<?php
if (isset($_SESSION['message'])) {
?>
    <h2><?= $_SESSION['message'] ?></h2>
<?php
    unset($_SESSION['message']);
}
?>

<?= $title = "Ticket de Caisse" ?>