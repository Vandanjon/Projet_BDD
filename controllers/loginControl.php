<?php

require __DIR__ . "/../models/loginModel.php";

if ( isset ($_GET["index"]) )
{
    require __DIR__ . "/../views/loginView.php";
}


?>