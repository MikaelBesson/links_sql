<?php

namespace Mika\App\Classes\Model\Manager;

use Mika\App\Classes\DB;
use Mika\App\Classes\CleanInput;
use Mika\App\Classes\Model\Entity\users;
use Mika\App\Classes\Controller\ErrorController;


class UsersManager
{

    /**
     * return all users
     * @return array
     */
    public function getUsers(): array
    {
        $conn = new DB();
        $users = [];
        $req = $conn->connect()->prepare('SELECT * FROM prefix_user');
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $data_user) {
            $users[] = new users($data_user['id'], $data_user['nom'], $data_user['prenom'], $data_user['mail'], $data_user['pass']);
        }
        return $users;
    }

    /**
     * return one user
     * @param int $id
     */
    public function getUser(int $id)
    {
        $conn = new DB();
        $req = $conn->connect()->prepare("SELECT * FROM prefix_user WHERE id = :id");
        $req->bindValue(":id", $id);
        $req->execute();
        $data = $req->fetch();
        if ($data) {
            return new users($data['id'], $data['nom'], $data['prenom'], $data['mail'], $data['pass']);
        }

        return null;
    }


    /**
     * return one user
     * @param string $mail
     * @return users|null
     */
    public function getUserByMail(string $mail): ?users
    {
        $conn = new DB();
        $req = $conn->connect()->prepare("SELECT * FROM prefix_user WHERE mail = :mail");
        $req->bindValue(":mail", $mail);
        $req->execute();
        $data = $req->fetch();
        if ($data) {
            return new users($data['id'], $data['nom'], $data['prenom'], $data['mail'], $data['pass']);
        }

        return null;
    }

    /**
     * Add a new user
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $pass
     */
    public function addUser($nom, $prenom, $mail, $pass)
    {
        $conn = new DB();
        $clean = new CleanInput();

        $nom = $clean->verifInput($nom);
        $prenom = $clean->verifInput($prenom);
        $mail = $clean->verifInput($mail);
        $pass = $clean->verifInput($pass);

        $req = $conn->connect()->prepare("INSERT INTO prefix_user (nom,prenom,mail,pass) VALUES (:nom,:prenom,:mail,:pass)");

        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':mail', $mail);
        $req->bindValue(':pass', $pass);
        $req->execute();
    }

    /**
     * edit user
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $pass
     * @param $id
     */
    public function editUser($nom, $prenom, $mail, $pass, $id)
    {
        $conn = new DB();
        $clean = new CleanInput();

        $nom = $clean->verifInput($nom);
        $prenom = $clean->verifInput($prenom);
        $mail = $clean->verifInput($mail);
        $pass = $clean->verifInput($pass);

        $req = $conn->connect()->prepare("UPDATE prefix_user set nom=:nom, prenom=:prenom, mail=:mail, pass=:pass WHERE id=:id");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':mail', $mail);
        $req->bindValue(':pass', $pass);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function deleteUser($id)
    {
        $conn = new DB();

        $req = $conn->connect()->prepare("DELETE FROM prefix_user WHERE id=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }
}
