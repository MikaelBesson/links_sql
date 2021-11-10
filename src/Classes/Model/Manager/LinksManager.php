<?php

namespace Mika\App\Classes\Model\Manager;

use Mika\App\Classes\DB;
use Mika\App\Classes\CleanInput;
use Mika\App\Classes\Model\Entity\links;

class LinksManager
{


    /**
     * return all links
     * @return array
     */
    public function getLinks(): array
    {
        $conn = new DB();
        $links = [];
        $req = $conn->connect()->prepare("SELECT * FROM prefix_link");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $data_link) {
            $links[] = new links($data_link['id'], $data_link['href'], $data_link['title'], $data_link['target'], $data_link['name'], $data_link['user_fk']);
        }
        return $links;
    }

    /**
     * return one link
     * @param int $id
     */
    public function getLink(int $id)
    {
        $conn = new DB();
        $req = $conn->connect()->prepare("SELECT * FROM prefix_link WHERE id = :id ");
        $req->bindValue(":id", $id);
        $req->execute();
        $data = $req->fetch();
        if ($data) {
            $link = new links($data['id'], $data['href'], $data['title'], $data['target'], $data['name'], $data['user_fk']);
            return $link;
        } else {
            echo 'ok';
        }
        return false;
    }

    /**
     * add a new link
     * @param $href
     * @param $title
     * @param $target
     * @param $name
     */
    public function addLink($href, $title, $target, $name)
    {
        $conn = new DB();
        $clean = new CleanInput();

        $title = $clean->verifInput($title);
        $name = $clean->verifInput($name);
        $userId = $_SESSION['user']->getId();

        $req = $conn->connect()->prepare("INSERT INTO prefix_link (href,title,target,name,user_fk) VALUES (:href,:title,:target,:name,:user_fk)");

        $req->bindValue(':href', $href);
        $req->bindValue(':title', $title);
        $req->bindValue(':target', $target);
        $req->bindValue(':name', $name);
        $req->bindValue(':user_fk', $userId);
        $req->execute();
    }


    /**
     * edit a link
     * @param $href
     * @param $title
     * @param $target
     * @param $name
     * @param $id
     */
    public function editLink($href, $title, $target, $name, $id)
    {
        $conn = new DB();
        $clean = new CleanInput();

        $title = $clean->verifInput($title);
        $name = $clean->verifInput($name);

        $req = $conn->connect()->prepare("UPDATE prefix_link set href=:newHref, title=:newTitle, target=:target, name=:newName WHERE id=:id");
        $req->bindValue(':newHref', $href);
        $req->bindValue(':newTitle', $title);
        $req->bindValue(':target', $target);
        $req->bindValue(':newName', $name);
        $req->bindValue(':id', $id);
        $req->execute();
    }


    public function deleteLink($id)
    {
        $conn = new DB();

        $req = $conn->connect()->prepare("DELETE FROM prefix_link WHERE id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
    }
}