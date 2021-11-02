<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\Model\Manager\LinksManager;
use Mika\App\Classes\renderController;

class LinkController extends renderController
{
    public function displayAddLink(){
        $this->render('FormLink');
    }

    public function addLink($href,$title,$target,$name){
        if(isset($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name'])){
            $link = new LinksManager();
            $link->addLink($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name']);
        }
    }

    public function displayEditLink($link){
        $this->render('EditLink',$link);
    }


}

