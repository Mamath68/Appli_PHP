    <?php
    include("header.php");
    session_start();
    ?>

    <body>
        <main>
            <?php
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            ?>
                <p>Aucun produit en Session...</p>
            <?php
            } else {
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
                        foreach ($_SESSION['products'] as $index => $product) {
                        ?>
                            <tr>
                                <td><?= $product["name"] ?></td>
                                <td><?= number_format($product["price"], 2, ",", "&nbsp;") ?> &nbsp;€</td>
                                <td><?= $product["qtt"] ?></td>
                                <td><?= number_format($product["total"], 2, ",", "&nbsp;") ?>&nbsp;€ </td>
                                <td><a class='btn btn-primary' href='traitement.php?action=augmenter&index=<?= $index ?>' role='button'>Augmenter</a></td>
                                <td><a class='btn btn-primary' href='traitement.php?action=reduire&index=<?= $index ?>' role='button'>Reduire</a></td>
                                <td><a class='btn btn-primary' href='traitement.php?action=deleteone&index=<?= $index ?>' role='button'>Supprimer</a></td>
                            </tr>
                        <?php
                            $totalGeneral += $product["total"];
                        }
                        ?>
                        <tr>
                            <td colspan=4>Total Général : </td>
                            <td><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?> &nbsp;€</strong></td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary separate" href="traitement.php?action=deleteAll" role="button">vider panier</a>
            <?php
            }
            if (isset($_SESSION['message'])) {
            ?>
                <h2><?= $_SESSION['message'] ?></h2>
            <?php
                unset($_SESSION['message']);
            }
            ?>
        </main>
    </body>

    </html>