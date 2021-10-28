<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\renderController;

class FormUserController extends renderController
{
    public function displayAddUser(){
        $this->render('FormUser');
    }
}