<!DOCTYPE html>
<html lang="fr">

<head>
    <title>55-60carac</title>
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="160carac">

    <link rel="stylesheet" href="style.css">
</head>

<!-- connexion BDD -->
<?php
try {
  $database = new PDO('mysql:host=localhost;dbname=test_julien_v2', 'root', '');
}

catch(Exception $e)
{
  die('ERROR : ' . $e->getMessage());
}
?>
<!--  -->


<body>
  <main>
    <div id="infos_DB">

    <?php
    
$results = $database->query('SELECT titre FROM films');

while($row = $results->fetch())
{
  echo $row['titre'], '<br>';
}

?>
    </div>
 
  </main>
</body>

</html>