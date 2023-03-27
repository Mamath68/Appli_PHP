<?php
session_start();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "addProduct":
            if (isset($_POST['submit'])) {

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if ($name && $price && $qtt) {

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];
                    $_SESSION["products"][] = $product;
                }

                if ($product) {

                    $_SESSION["message"] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hey salut!</strong>
                Vos produits ont bien été ajouté
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                    header("Location:index.php");
                } else {
                    $_SESSION["message"] =
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hey salut!</strong>
                Vos Informations sont fausses
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                    header("Location:index.php");
                }
            }
            break;
        case "deleteAll":
            unset($_SESSION['products']);
            header("Location:index.php");
            $_SESSION['message'] = "Vous avez bien supprimé ce Tableau";
            break;
        case "deleteone":
            if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
                $_SESSION['message'] = "Vous avez bien supprimé " . $_SESSION['products'][$_GET['index']]['name'];
                unset($_SESSION['products'][$_GET['index']]);
            }
            header("Location:recap.php");
            break;
        case "plus":
            if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
                $_SESSION['products'][$_GET['index']]['qtt'] += 1;
                $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['qtt'] * $_SESSION['products'][$_GET['index']]['price'];
                $_SESSION['message'] = "Vous avez bien augmenté la quantité de " . $_SESSION['products'][$_GET['index']]['name'];
            }
            header("Location:recap.php");
            break;
        case "moin":
            if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
                $_SESSION['products'][$_GET['index']]['qtt'] -= 1;
                $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['qtt'] * $_SESSION['products'][$_GET['index']]['price'];
                $_SESSION['message'] = "Vous avez bien reduit la quantité de " . $_SESSION['products'][$_GET['index']]['name'];
            }
            header("Location:recap.php");
            break;
    }
}