<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\renderController;

class FormLinkController extends renderController
{
    public function displayAddLink(){
        $this->render('FormLink');
    }
}

