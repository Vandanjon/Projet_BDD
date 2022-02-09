<?php $title = 'Error Panic'; ?>

<?php ob_start(); ?>

<?php echo $errorMessage; ?>

    </main>
</body>

</html>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>