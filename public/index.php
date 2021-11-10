<?php


use Mika\App\Classes\Controller\ErrorController;
use Mika\App\Classes\Controller\LinkController;
use Mika\App\Classes\Controller\LogginController;
use Mika\App\Classes\Controller\MailController;
use Mika\App\Classes\Controller\UserController;
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

        /**
         * display a form view to edit a link
         */
        case 'form_edit':
            $controller = new LinkController();
            $controller->displayEditLink($_GET['id']);
            break;

        /**
         * to edit a link
         */
        case 'edit_link':
            if (isset($_GET['id'])) {
                $controller = new LinkController();
                $controller->editLink($_GET['id']);
            } else {
                $errorController->showError("impossible de modifier le lien");
            }
            break;

        /**
         * to delete a link
         */
        case 'delete_link':
            if (isset($_GET['id'])) {
                $controller = new LinkController();
                $controller->deleteLink($_GET['id']);
            } else {
                $errorController->showError("impossible de modifier le lien");
            }
            break;

        /**
         * display a form view to add an user
         */
        case 'form_user':
            $controller = new UserController();
            $controller->displayAddUser();
            break;

        /**
         * to add an user
         */
        case 'add_user':
            $controller = new UserController();
            if (!$controller->addUser()) {
                $errorController->showError("impossible d'ajouter un utilisateur");
            }
            break;

        /**
         * display a form loggin
         */
        case 'form_loggin':
            $controller = new LogginController();
            $controller->displayFormLoggin();
            break;

        /**
         * to log a user
         */
        case 'loggin':
            $controller = new LogginController();
            $controller->checkLog();
            break;

        /**
         * to disconnect an user
         */
        case 'user_disconnect':
            $controller = new UserController();
            $controller->disconnect();
            break;

        /**
         * display a form view to send a mail
         */
        case 'mail':
            $controller = new MailController();
            $controller->displayMail();
            break;

        /**
         * to send an email
         */
        case 'send_mail':
            $controller = new MailController();
            $controller->sendMail();
            break;

        /**
         * display a home view
         */
        case 'home':
            $controller = new HomeController();
            $controller->displayHome();
            break;
    }
} else {
    $controller = new LogginController();
    $controller->displayFormLoggin();
}









