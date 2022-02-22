<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="160carac">

    <title><?= $title?></title><!-- 55-60c -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
if ($_SESSION)
{
    $name = $_SESSION["userName"];
}

if ($title != "index")
{
    echo <<<EOT
    <nav class="navtop">
        <div>
            <h1>Website Title - $title</h1>
            <a href="administration.php"><i class="fas fa-home"></i>Admin</a>
            <a href="create.php"><i class="fas fa-home"></i>Create</a>
            <a href="profile.php"><i class="fas fa-address-book"></i>Profile</a>
        </div>

        <div>
        <p>Hi <a href="profile.php">$name</a></p>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </nav>
    EOT;
}
?>

<?= $content ?>


</body>

</html>