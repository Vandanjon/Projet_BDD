<?php

session_start();

$title = "Login";
$metaDesc = "If you are here, it means that you are not loged in. Please log in.";



include_once("include/header.inc");
// /include/header => doesnt work

?>
<main id="login_view">

    <div id="login_wrap">

        <h1><?= $title ?></h1>

        <form action="../models/User.php" method="post" id="loginform">
            <fieldset>
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input name="username" id="username" type="text" placeholder="Username" required />
            </fieldset>
            <fieldset>
                <label>
                    <i class="fas fa-lock"></i>
                </label>
                <input name="password" id="password" type="password" placeholder="Password" required />
            </fieldset>
        </form>

        <input form="loginform" type="submit" name="submit" value="log in">
    </div>

</main>

<?php

include_once("include/footer.inc");