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


    /**
     * @param int $id
     * display a form to edit link
     */
    public function displayEditLink(int $id)
    {
        $manager = new LinksManager();
        $Link = $manager->getLink($id);
        if ($Link !== null) {
            $this->render('edit_link', $Link);
        } else {
            $errorCtrl = new ErrorController();
            $errorCtrl->showError("le lien n'existe pas!");
        }
    }


    /**
     * @param int $id
     * to edit a link
     */
    public function editLink(int $id)
    {
        if (isset($_POST['newHref'], $_POST['newTitle'], $_POST['target'], $_POST['newName'])) {
            $link = new LinksManager();
            $link->editLink($_POST['newHref'], $_POST['newTitle'], $_POST['target'], $_POST['newName'], $id);
            (new HomeController())->displayHome();
        } else {
            $errorCtrl = new ErrorController();
            $errorCtrl->showError("Tous les champs ne sont pas remplis!");
        }
    }


    /**
     * @param int $id
     * to delete a link
     */
    public function deleteLink(int $id)
    {
        $link = new LinksManager();
        $link->deleteLink($id);
        (new HomeController())->displayHome();
    }
}

