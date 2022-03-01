<?php
session_start();

require_once "setup.php";


$title = "index";
ob_start();
?>

<main id="main_index">
    <section>
        <h1>Login</h1>
        <form action="authenticate.php" method="post">
            <fieldset>
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="username" placeholder="Username" id="username" required>
            </fieldset>
            
            <fieldset>
                <label for="password">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>
            </fieldset>
            
            <input type="submit" value="Login">
        </form>
    </section>

    <aside id="login_bg">
        <!-- <img src="public/img/secure_bg.jpg" alt="illustration secure login image" width="1600" height="1155"> -->
    </aside>
</main>


<?php
$content = ob_get_clean();

require_once "views/template.php";