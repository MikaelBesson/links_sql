<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\Model\Manager\UsersManager;
use Mika\App\Classes\renderController;

class UserController extends renderController
{
    public function displayAddUser(){
        $this->render('FormUser');
    }

    public function addUser(): bool
    {
        if(isset($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['pass'])){
            $user = new UsersManager();
            $user->addUser($_POST['nom'],$_POST['prenom'],$_POST['mail'],password_hash($_POST['pass'],PASSWORD_BCRYPT));
            return true;
        }
        else{
            return false;
        }
    }
}