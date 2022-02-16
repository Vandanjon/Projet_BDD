<?php

session_start();
// require_once "functions/header.inc";

$title = "Reporting Tool V";

ob_start();

?>


<main class="login content">
    <h1>Login</h1>
    <form action="authenticate.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Login">
    </form>
</main>

<?php
$content = ob_get_clean();

require_once "views/template.php";