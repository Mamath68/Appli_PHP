<?php

// Ouvre le namespace Controller
namespace Controllers;

// fait appel a Session dans le namespace Core
use Core\Session;
// fait appel a AbstractController dans le namespace Core
use Core\AbstractController;
// fait appel a ControllerInterface dans le namespace Core
use Core\ControllerInterface;
// fait appel a BoutiqueManager dans le namespace Models\Managers
use Models\Managers\BoutiqueManager;

// class HomeController hérite de la classe AbstractController et implémente ControllerInterface.
class BoutiqueController extends AbstractController implements ControllerInterface
{
    public function index()
    {
        return [
            "view" => VIEW_DIR . "home.php",

        ];
    }

    public function addProductForm()
    {
        $boutiqueManager = new BoutiqueManager();
        $boutique = $boutiqueManager->findAll();

        return [
            "view" => VIEW_DIR . "Calcules/AddProductForm.php",
            "data" =>
            [
                "boutiques" => $boutique,
            ]
        ];
    }

    public function addProduct()
    {
        if (isset($_POST['submit'])) {

            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);

            if ($name && $price && $quantity) {
                $boutiqueManager = new BoutiqueManager();

                $boutique = !$boutiqueManager->add(
                    [
                        "name" => $name,
                        "price" => $price,
                        "quantity" => $quantity,
                        "total" => $price * $quantity
                    ]
                );

                $_SESSION["message"] = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey salut!</strong> <br>
                        Vos produits ont bien été ajouté
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                $this->redirectTo("Boutique", "TicketCaisse");
                return [
                    "view" => VIEW_DIR . "Calcules/AddProductForm.php",
                ];
            }
        } else {
            $_SESSION["message"] =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hey salut!</strong>
                        Vos Informations sont fausses
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            $this->redirectTo("Boutique", "index");
        }
    }

    public function TicketCaisse()
    {
        $boutiqueManager = new BoutiqueManager();
        $boutique = $boutiqueManager->findTotalGeneral();

        return [
            "view" => VIEW_DIR . "Calcules/Recapitulatif.php",
            "data" =>
            [
                "boutique" => $boutique
            ]
        ];
    }
    public function deleteAll()
    {
        unset($_SESSION['products']);
        $this->redirectTo("Boutique", "index");
        $_SESSION['message'] = "Vous avez bien supprimé ce Tableau";
    }
    public function deleteOne()
    {
        if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
            $_SESSION['message'] = "Vous avez bien supprimé " . $_SESSION['products'][$_GET['index']]['name'];
            unset($_SESSION['products'][$_GET['index']]);
        }
        $this->redirectTo("Boutique", "TicketCaisse");
    }
    public function augmenter()
    {
        if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
            $_SESSION['products'][$_GET['index']]['quantity'] += 1;
            $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['quantity'] * $_SESSION['products'][$_GET['index']]['price'];
            $_SESSION['message'] = "Vous avez bien augmenté la quantité de " . $_SESSION['products'][$_GET['index']]['name'];
        }
        $this->redirectTo("Boutique", "TicketCaisse");
    }
    public function reduire()
    {
        if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
            $_SESSION['products'][$_GET['index']]['quantity'] -= 1;
            $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['quantity'] * $_SESSION['products'][$_GET['index']]['price'];
            $_SESSION['message'] = "Vous avez bien reduit la quantité de " . $_SESSION['products'][$_GET['index']]['name'];
        }
        $this->redirectTo("Boutique", "TicketCaisse");
    }
}
