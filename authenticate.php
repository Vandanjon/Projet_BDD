<?php
session_start();
require_once ROOT . "/define.php";

require_once ROOT . "functions/db.php";


$pdo = get_connexion();


if ( !isset($_POST['username'], $_POST['password']) )
{
	exit('Please fill both the username and password fields!');
}


if ($stmt = $pdo->prepare('SELECT id, password FROM accounts WHERE username = :username'))
{
	$stmt->bindParam(':username', $_POST['username']);
	$stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (is_array($row))
    {
        if (password_verify($_POST["password"], $row["password"]))
        {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: administration.php');
        }

        else
        {
            echo 'Incorrect password!';
        }
    }

    else
    {
        echo 'Incorrect username!';
    }
}