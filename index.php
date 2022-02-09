<?php

require ("controllers/loginControl.php");

try
{
    if ( isset ( $_GET["action"] ) )
    {
        if ( $_GET["action"] == "writePouet" )
        {
            echo ("pouet");
        }
        elseif ( $_GET["action"] == "writeBam" )
        {
            echo ("bam");
        }
        elseif ( $_GET["action"] == "login" )
        {
            login();
        }
    }

    else
    {
        // throw new Exception("Aucune action trouvée.");
        login();
    }
}

catch (Exception $e) // s"il y a une erreur, afficher le message
{
    $errorMessage = $e->getMessage();
    require("views/errorView.php");
}



?>