<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: loginView.php');
	exit;
}
?>
<?php
$title = "Administration";
$metaDesc = "the best administration page of the entire world. Yours.";

include_once("include/header.inc");
?>

<main>

bouh

</main>

<?php
include_once("include/footer.inc");