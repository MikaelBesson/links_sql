<?php

namespace Mika\App\Classes\Controller;


use Mika\App\Classes\Model\Manager\UsersManager;
use Mika\App\Classes\renderController;

class UserController extends renderController
{
    /**
     * display a form to add user
     */
    public function displayAddUser(){
        $this->render('FormUser');
    }

    /**
     * @return bool
     * to add user
     */
    public function addUser(): bool
    {
        if(isset($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['pass'])){
            $user = new UsersManager();
            $user->addUser($_POST['nom'],$_POST['prenom'],$_POST['mail'],password_hash($_POST['pass'],PASSWORD_BCRYPT));
            (new HomeController())->displayHome();
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * to disconnect a user
     */
    public function disconnect()
    {
        $_SESSION = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['samesite']);
        session_destroy();
        (new LogginController())->displayFormLoggin();
    }

}