<?php

session_start();

class User {

    function dbConnexion()
    {
        
        /**
         * @desc Creates a new PDO connection and returns the handler.
         **/
    }
    
    
    function login()
    {
        
        /**
         * @desc Test if the username and the password entered match the database records
         **/ 
    }
}

    $db_host = 'localhost';
    $db_name = 'ffebefvd_reporting';
    $db_user = 'root';
    $db_pass = '';

    try
    {
        $connexion = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8", $db_user, $db_pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // return $connexion;
    }
    
    catch(PDOException $exception)
    {
        throw new Exception("Database connexion error.");
        echo "Erreur de connexion : " . $exception->getMessage();
    }
    
    
    var_dump($connexion);
    
    $username = $password = "";
    var_dump($username);
    var_dump($password);
    
    $username = str_replace(" ", "", trim($_POST["username"]));
    $password = str_replace(" ", "", trim($_POST["password"]));
    var_dump($username);
    var_dump($password);
    
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    var_dump($hashed_pass);
    
    $verif = $connexion->prepare("SELECT username, password FROM accounts");
    var_dump($verif);

    $verif->execute();
    
    $results = $verif->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
    var_dump($results[0]);
    // var_dump($results["username"]);

    
    $database = $connexion->query("SELECT * FROM accounts");
    var_dump($database);


    while($row = $database->fetch())
    {
        if ($row["username"] == $username && password_verify($password, $row["password"]))
        {
            echo "You're loggable";
        }
        else
        {
            echo "incorrect username or password";
        }
    }
    
    
    
    // if ($row["username"] == $username)
    // {
    //     echo $username;
    // }
    
    // // echo $row["username"];
    // // echo "<br>";
    // // echo $row["password"];
    // else
    // {
    //     echo "no username";
    // }

    // if(password_verify($password, $row["password"]))
    // {
    //     echo $row["password"];
    // }
    // else
    // {
    //     echo "no password";
    // }
    
    // if ($username == $results["username"])
    // {
    //     echo "e cool";
    //     return "r cool";
        
    // }
    
    // else
    // {
    //     echo "e pas cool";
    //     return "r pas cool";
        
    // }
    
    
    
    // return array($username, $password, $hashed_pass, $verif, $results);
    



    
    // echo "login<br>";
    // $login = login();
    // var_dump($login);
    

    // if ($username !== "" && $hashed_pass !== "")
    // {

    //     if ($results["password"] === $hashed_pass)
    //     {
    //         echo "le password est bon<br>";
    //     }

    //     else
    //     {
    //         throw new Exception("nooooooooooo");
    //     }

    //     if ($results["username"] === $username)
    //     {
    //         echo "le username est bon<br>";
    //     }

    //     else
    //     {
    //         throw new Exception("Username or Password doesn't match the database.");
    //     }


    // }

    // else
    // {
    //     throw new Exception("No IDs given.");
    // }


// echo "dbconnexion<br>";
// $getcon = dbConnexion();
// var_dump($getcon);

// echo "fetch<br>";
// $req=$getcon->prepare("SELECT * FROM accounts");
// $req->execute();
// $total=$req->fetch();
// var_dump($total);

// echo "Erreur de connexion : " . $exception->getMessage();

// $verif = dbConnexion()->prepare("SELECT username, password FROM accounts");
// $verif->execute();

// $resultatS = $verif->fetchAll(PDO::FETCH_ASSOC);
// $resultat = $verif->fetch();

// echo "resultat<br>";
// var_dump($resultat);
// echo "<br>";
// echo "resultatS<br>";
// var_dump($resultatS);

// print_r($resultat);



