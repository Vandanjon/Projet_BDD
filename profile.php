<?php

session_start();
require_once "models/db.php";

if ( !isset($_SESSION["loggedin"]) )
{
	header("Location: index.php");
	exit;
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'ffebefvd_reporting';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();


$title = "profile";
ob_start();

?>

<main>

	<div class="content">
		<h2>Profile Page</h2>
		<div>
			<p>Your account details are below:</p>
			
		</div>
		<?php
foreach ($_SESSION as $key=>$val)
echo $key. ": ".$val. "<br>";
?>
	</div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require "views/template.php"; ?>