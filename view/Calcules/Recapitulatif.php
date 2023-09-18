<?php
$boutiques = $result['data']['boutique'];

?>
<table class='table text-light'>
    <thead>
        <tr>
            <th scope='col'> Nom </th>
            <th scope='col'> Prix </th>
            <th scope='col'> Quantité </th>
            <th scope='col'> Total </th>
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
                <tr>
                    <td><?= $boutique->getName() ?></td>
                    <td><?= number_format($boutique->getPrice(), 2, ",", "&nbsp;") ?> &nbsp;€</td>
                    <td><?= $boutique->getQuantity() ?></td>
                    <td><?= number_format($boutique->getTotal(), 2, ",", "&nbsp;") ?>&nbsp;€ </td>
                    <td><a class='btn btn-primary' href='index.php?ctrl=boutique&action=augmenter&id=<?= $boutique->getId() ?>' role='button'>Augmenter</a></td>
                    <td><a class='btn btn-primary' href='index.php?ctrl=boutique&action=reduire&id=<?= $boutique->getId() ?>' role='button'>Reduire</a></td>
                    <td><a class='btn btn-primary' href='index.php?ctrl=boutique&action=deleteOne&id=<?= $boutique->getId() ?>' role='button'>Supprimer</a></td>
                </tr>
                <?php
                    }
                }
                ?>
                <?php
                $totalGeneral += $boutique->getTotal();
                ?>
                <tr>
                    <td colspan=4>Total Général : </td>
                    <td><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?> &nbsp;€</strong></td>
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