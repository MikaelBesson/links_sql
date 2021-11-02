<?php


use Mika\App\Classes\Controller\LinkController;
use Mika\App\Classes\Controller\UserController;
use Mika\App\Classes\Controller\HomeController;
use Mika\App\Classes\Model\Manager\LinksManager;


require  '../vendor/autoload.php';


session_start();


if(isset($_GET['ctrl'])) {
    switch ($_GET['ctrl']) {
        case 'FormLink':
            $controller = new LinkController();
            $controller->displayAddLink();
            break;

        case 'addLink':
            $controller = new LinkController();
            $controller->addLink($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name']);
            header ('Location:/index.php');
            break;

        case 'FormEdit':
            if(isset($_GET['id'])){
                $manager = new LinksManager();
                $link = $manager->getLink($_GET['id']);
                if($link){
                    $controller = new LinkController();
                    $controller->displayEditLink($link);
                }
            }
            break;

        case 'editLink':
            break;

        case 'deleteLink':
            break;

        case 'FormUser':
            $controller = new UserController();
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









