<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\Model\Manager\LinksManager;
use Mika\App\Classes\renderController;

class LinkController extends renderController
{

    /**
     * display a form view to add a link
     */
    public function displayAddLink()
    {
        $this->render('form_link');
    }


    /**
     * @return bool
     * to add a link
     */
    public function addLink(): bool
    {
        if (isset($_POST['href'], $_POST['title'], $_POST['target'], $_POST['name'])) {
            $link = new LinksManager();
            $link->addLink($_POST['href'], $_POST['title'], $_POST['target'], $_POST['name']);
            (new HomeController())->displayHome();
            return true;
        } else {
            return false;
        }
    }

}

