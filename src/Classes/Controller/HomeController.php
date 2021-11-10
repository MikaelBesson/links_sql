<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\renderController;
use Mika\App\Classes\Model\Manager\LinksManager;

class HomeController extends renderController
{
    /**
     * display a home view
     */
    public function displayHome()
    {

        $data = (new LinksManager)->getLinks();
        $this->render('home', $data);
    }
}