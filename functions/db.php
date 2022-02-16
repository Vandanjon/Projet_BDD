<?php

function get_connexion()
{

    $db_host = "localhost";
    $db_name = "ffebefvd_reporting";
    $db_user = "root";
    $db_pass = "";
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


$db_host = "localhost";
$db_name = "ffebefvd_reporting";
$db_user = "root";
$db_pass = "";