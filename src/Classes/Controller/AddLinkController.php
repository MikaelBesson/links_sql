<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\Model\Manager\LinksManager;

class AddLinkController
{
    public function addLink($href,$title,$target,$name){
        if(isset($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name'])){
            $link = new LinksManager();
            $link->addLink($_POST['href'],$_POST['title'],$_POST['target'],$_POST['name']);
        }
    }
}