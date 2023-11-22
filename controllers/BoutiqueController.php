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
                <h4 class="alert-heading">Hey salut! T\'as bien ajouté tes articles</h4>
                <p class="mb-0"><a class="link-success" href="index.php?ctrl=boutique&action=addProductForm">T\'en veux encore,</a><a class="link-primary" href="index.php?ctrl=boutique&action=index">ou on s\'arrete ici ?</a></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                $this->redirectTo("Boutique", "pannier");
                return [
                    "view" => VIEW_DIR . "Calcules/AddProductForm.php",
                ];
            }
        } else {
            $_SESSION["message"] =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Hey salut! T\'as rentré de mauvaises infos</h4>
                <p class="mb-0"><a class="link-success" href="index.php?ctrl=boutique&action=addProductForm">On retente?</a></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            $this->redirectTo("Boutique", "addProductForm");
        }
    }
    public function pannier()
    {
        $boutiqueManager = new BoutiqueManager();
        $boutique = $boutiqueManager->findAll();

        return [
            "view" => VIEW_DIR . "Calcules/Recapitulatif.php",
            "data" =>
            [
                "boutique" => $boutique,
            ]
        ];
    }
    public function deleteAll()
    {
        $boutique = new BoutiqueManager();
        $boutique->deleteAll();
        $this->redirectTo("Boutique", "index");
        $_SESSION['message'] = "Vous avez bien supprimé ce Tableau";
    }
    public function deleteOne($id)
    {
        $boutiqueManager = new BoutiqueManager();
        $boutiqueManager->deletebyId($id);
        $_SESSION['message'] = "Vous avez bien supprimé cette ligne ";
        $this->redirectTo("Boutique", "pannier");
    }
    public function augmenter($id)
    {
        $boutiqueManager = new BoutiqueManager();
        $boutiqueManager->updatePlus($id);
        $_SESSION['message'] = "Vous avez bien augmenté le stock de cette ligne ";
        $this->redirectTo("Boutique", "pannier");
    }
    public function reduire($id)
    {
        $boutiqueManager = new BoutiqueManager();
        $boutiqueManager->updateMinus($id);
        $_SESSION['message'] = "Vous avez bien réduit le stock de cette ligne ";
        $this->redirectTo("Boutique", "pannier");
    }
}
