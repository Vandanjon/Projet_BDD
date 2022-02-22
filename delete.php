<?php

session_start();
require_once "models/db.php";


$pdo = get_connexion();
$msg = "";

if ( isset($_GET['id']) )
{
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( !$contact )
    {
        exit("Contact doesn't exist with that ID!");
    }

    // Make sure the user confirms before deletion
    if ( isset($_GET["confirm"]) )
    {
        if ($_GET["confirm"] == "yes")
        {
            $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
            $stmt->execute([$_GET["id"]]);
            $msg = "You have deleted the contact!";
        }
        
        else
        {
            header("Location: administration.php");
            exit;
        }
    }
}

else
{
    exit("No ID specified!");
}

$title = "delete";
ob_start();
?>

<div class="content delete">
	<h2>Delete Contact #<?=$contact["id"]?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact["id"]?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact["id"]?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$contact["id"]?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require "views/template.php"; ?>