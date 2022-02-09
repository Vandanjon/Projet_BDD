<?php

// connexion BDD //

class Database
{

    // modifier en fonction des besoins
    private static $db_host = 'localhost';
    private static $db_name = 'test_julien_v2';
    private static $db_user = 'root';
    private static $db_user_password = '';
    // fin des modifs
    
    private static $connection = null;

    public static function connect()
    {
        try
        {
          self::$connection = new PDO('mysql:host=' . self::$db_host . ';dbname=' . self::$db_name,self::$db_user,self::$db_user_password);
          self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        catch(PDOException $e)
        {
          die('ERROR : ' . $e->getMessage());
        }

        return self::$connection;
    }

    public static function disconnect()
    {
      self::$connection = null;
    }
}

// fin connexion BDD //

?>