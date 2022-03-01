<?php

# Racine

define("ROOT", __DIR__ . "/");

###


# Database Datas

define("DB_SERVER", "localhost");
define("DB_NAME", "ffebefvd_reporting");
define("DB_USER", "root");
define("DB_PASSWORD", "");

###


# Database Base Sample

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if ( $conn->connect_error )
{
    exit("Connection failed: " . $conn->connect_error);
}

$query = "SELECT id FROM accounts";
$result = mysqli_query( $conn, $query );

if( empty($result) )
{
    $query = "CREATE TABLE accounts (
                id int(11) AUTO_INCREMENT,
                username varchar(50) NOT NULL,
                password varchar(255) NOT NULL,
                email varchar(100) NULL,
                role varchar(50) NOT NULL,
                PRIMARY KEY  (ID)
                )";
    $result = mysqli_query($conn, $query);
}

###