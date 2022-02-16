<?php
require_once ROOT . '/define.php';
// echo ROOT;
function get_connexion()
{

    $db_host = "DB_SERVER";
    $db_name = "DB_NAME";
    $db_user = "DB_USER";
    $db_pass = "DB_PASSWORD";
    $pdo = NULL;
    
    try
    {
        $pdo = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    catch (PDOException $exception)
    {
        echo 'Database connection failed<br>';
        print_r($exception);
        die();
    }
    
    return $pdo;

}