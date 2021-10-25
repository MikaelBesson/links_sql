<?php
require  '../vendor/autoload.php';


session_start();


if(isset($_GET['ctrl'])) {
    switch ($_GET['ctrl']) {
        case 'FormLink':
            $controller = new \Mika\App\Classes\Controller\FormLinkController();
            $controller->displayAddLink();
            break;

        case 'addLink':
            $controller = new \Mika\App\Classes\Controller\AddLinkController();
            $controller->addLink($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name']);
            header ('Location:/index.php');
            break;
    }

}
else {
    $controller =new \Mika\App\Classes\Controller\HomeController();
    $controller->displayHome();
}









