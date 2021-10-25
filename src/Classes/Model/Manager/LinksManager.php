<?php

namespace Mika\App\Classes\Model\Manager;

use Mika\App\Classes\DB;
use Mika\App\Classes\CleanInput;
use Mika\App\Classes\Model\Entity\links;
use Muffeen\UrlStatus\UrlStatus;

class LinksManager {


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
        foreach ($data as $data_link){
            $links[] = new links($data_link['id'],$data_link['href'],$data_link['title'],$data_link['target'],$data_link['name']);
        }
        return $links;
    }

    /**
     * return one link
     * @param int $id
     * @return links|null
     */
    public function getLink(int $id)
    {
        $conn = new DB();
        $req = $conn->connect()->prepare("SELECT * FROM prefix_link WHERE id = :id");
        $req->bindValue(":id", $id);
        $data = $req->fetch();
        if($data){
            return $link = new links($data['id'],$data['href'],$data['title'],$data['target'],$data['name']);
        }
        else {
            return null;
        }
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
        $clean =new CleanInput();

        $href = UrlStatus::get($href);
        $http_status_code = $href->getStatusCode();
        $response_header =$href->getResponseHeaders();
        $title = $clean->verifInput($title);
        $name =$clean->verifInput($name);

        $req = $conn->connect()->prepare("INSERT INTO prefix_link (href,title,target,name) VALUES (:href,:title,:target,:name)");

        $req->bindValue(':href', $href);
        $req->bindValue(':title', $title);
        $req->bindValue(':target', $target);
        $req->bindValue(':name', $name);
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
    public function editLink($href, $title, $target, $name, $id){
        $conn = new DB();
        $clean =new CleanInput();

        $title = $clean->verifInput($title);
        $name =$clean->verifInput($name);

        $req = $conn->connect()->prepare("UPDATE prefix_link set href=:href, title=:title, target=:target, name=:name WHERE id=:id");
        $req->bindValue(':href', $href);
        $req->bindValue(':title', $title);
        $req->bindValue(':target', $target);
        $req->bindValue(':name', $name);
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