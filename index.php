<?php

require_once __DIR__ . "/controllers/loginControl.php";

try
{
    if ( isset ($_GET["action"]) )
    {
        if ($_GET["action"] == "login")
        {
            login();
        }
        elseif ($_GET["action"] == "writeBam")
        {
            echo ("bam");
        }
        elseif ($_GET["action"] == "writePouet")
        {
            echo ("pouet");
        }
    }

    else
    {
        throw new Exception("Aucune action trouvée pour la route.");
        login();
    }
}

catch (Exception $e) // s"il y a une erreur, afficher le message
{
    $errorMessage = $e->getMessage();
    require "views/errorView.php";
}


?>