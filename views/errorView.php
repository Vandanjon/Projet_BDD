<?php $title = 'Error Panic'; ?>

<?php ob_start(); ?>

<h1>Vous arrivez sur une page d'erreur</h1>

<p>Vous pouvez contacter notre service technique à cette adresse : tagazok@gmail.com et lui partager ce message d'erreur :</p>
<p style="font-weight:bold;">" <?php echo $errorMessage; ?> "</p>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>