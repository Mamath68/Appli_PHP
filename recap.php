<!DOCTYPE html>
<html lang="fr">
    
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Recapitulatif des produits</title>
</head>

<body>
    <?php
    include("header.php");
    session_start();
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en Session...</p>";
    } else {
        echo "<table class='table text-light'>",
            "<thead>",
            "<tr>",
            "<th scope='col'> # </th>",
            "<th scope='col'> Nom </th>",
            "<th scope='col'> Prix </th>",
            "<th scope='col'> Quantité </th>",
            "<th scope='col'> Total </th>",
            "</tr>",
            "</thead>",
            "<tbody>";
        $totalGeneral = 0;
        foreach ($_SESSION['products'] as $index => $product) {
            echo "<tr>",
                "<td>" . $index . "</td>",
                "<td>" . $product["name"] . "</td>",
                "<td>" . number_format($product["price"], 2, ",", "&nbsp") . "&nbsp;€</td>",
                "<td>" . $product["qtt"] . "</td>",
                "<td>" . number_format($product["total"], 2, ",", "&nbsp") . "&nbsp;€</td>",
                "</tr>";
            $totalGeneral += $product["total"];
        }
        echo
            "<tr>",
            "<td colspan=4>Total Général : </td>",
            "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp") . "&nbsp;€</strong></td>",
            "</tr>",
            "</tbody>",
            "</table>";
    }
    ?>
</body>

</html>