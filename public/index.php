<?php


use Mika\App\Classes\Controller\ErrorController;
use Mika\App\Classes\Controller\LinkController;
use Mika\App\Classes\Controller\HomeController;


require '../vendor/autoload.php';


session_start();

if (isset($_GET['ctrl'])) {
    $errorController = new ErrorController();

    switch ($_GET['ctrl']) {

        /**
         * display a form view to add a link
         */
        case 'form_link':
            $controller = new LinkController();
            $controller->displayAddLink();
            break;

        /**
         * to add a link
         */
        case 'add_link':
            $controller = new LinkController();
            if (!$controller->addLink()) {
                $errorController->showError("impossible d'ajouter le lien");
            }
            break;

    }
} else {
    $controller = new HomeController();
    $controller->displayHome();
}









