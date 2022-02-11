<?php

abstract class Model
{

###############################################################################
// À modifier par projet

    private $db_host = "localhost";
    private $db_name = "test_v3";
    private $db_user = "root";
    private $db_password = "";

###############################################################################

    protected $_connexion;
    public $table;
    public $id;

    public function getConnection()
    {
        $this->_connexion = null;

        try
        {
            $this->_connexion = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
            $this->_connexion->exec("set names utf8");
            $this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception)
        {
            throw new Exception("Erreur de connexion");
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }  
    
    public function getOne()
    {
    $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $this->id;
    $query = $this->_connexion->prepare($sql);
    $query->execute();
    return $query->fetch();    
    }

    public function getAll()
    {
    $sql = "SELECT * FROM " . $this->table;
    $query = $this->_connexion->prepare($sql);
    $query->execute();
    return $query->fetchAll();
    }

}

