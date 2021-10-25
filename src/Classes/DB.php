<?php

namespace Mika\App\Classes;
use PDO;
use PDOException;

class DB {

    private string $server;
    private string $user;
    private string $password;
    private string $db;

    /**
     */
    public function __construct()
    {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "links_sql";
    }

    public function connect(): ?PDO
    {
        try{
            $db = new PDO("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "erreur de connexion : ".$e->getMessage();
            return null;
        }
        return $db;
    }
}