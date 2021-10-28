<?php

use Mika\App\Classes\Controller\AddLinkController;
use Mika\App\Classes\Controller\FormLinkController;
use Mika\App\Classes\Controller\FormUserController;
use Mika\App\Classes\Controller\HomeController;
use Mika\App\Classes\Controller\UserController;

require  '../vendor/autoload.php';


session_start();


if(isset($_GET['ctrl'])) {
    switch ($_GET['ctrl']) {
        case 'FormLink':
            $controller = new FormLinkController();
            $controller->displayAddLink();
            break;

        case 'addLink':
            $controller = new AddLinkController();
            $controller->addLink($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name']);
            header ('Location:/index.php');
            break;

        case 'FormUser':
            $controller = new FormUserController();
            $controller->displayAddUser();
            break;

        case 'addUser':
            $controller = new UserController();
            if($controller->addUser()){
                header ('Location:/index.php');
            }
            break;
    }

}
else {
    $controller =new HomeController();
    $controller->displayHome();
}









