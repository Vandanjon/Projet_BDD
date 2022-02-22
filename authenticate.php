<?php
session_start();

require_once "setup.php";
require_once "models/db.php";



$pdo = get_connexion();


if ( !isset($_POST["username"], $_POST["password"]) )
{
	exit("Please fill both the username and password fields!");
}


if ($stmt = $pdo->prepare( "SELECT * FROM accounts WHERE username = :username LIMIT 1") )
{
	$stmt->bindParam( ":username", $_POST["username"] );
	$stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ( is_array($row) )
    {
        if ( password_verify($_POST["password"], $row["password"]) )
        {
            // session_regenerate_id();  // https://www.php.net/manual/fr/function.session-regenerate-id.php
            $_SESSION["loggedin"] = true;
            $_SESSION["userId"] = $row["id"];
            $_SESSION["userName"] = $row["username"];
            $_SESSION["userPassword"] = $row["password"];
            $_SESSION["userEmail"] = $row["email"];
            
            header("Location: administration.php");
        }

        else
        {
            echo "Incorrect password!";
        }
    }

    else
    {
        echo "Incorrect username!";
    }
}