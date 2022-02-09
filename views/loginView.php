<?php $title = 'Reporting Tool V'; ?>

<?php ob_start(); ?>

        <!-- LOGIN -->
        <form action="" method="POST">
            <h1>login</h1>

            <label>username</label>
            <input type="text" placeholder="John Doe" name="username" required>

            <label>password</label>
            <input type="password" placeholder="1234" name="password" required>

            <input type="submit" id='submit' value='log in'>
        </form>
        <!-- END LOGIN -->

    </main>
</body>

</html>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>