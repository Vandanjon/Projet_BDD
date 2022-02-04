<?php

  // Initialiser la session
  session_start();
  
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(isset($_GET['deconnexion']))
  { 
     if($_GET['deconnexion']==true)
     {  
        session_unset();
        header("location:../index.php");
     }
  }
  else if($_SESSION['username'] !== ""){
      $user = $_SESSION['username'];
      // afficher un message
      echo "<br>Bonjour $user, vous êtes connecté";
  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Administration de la BDD</title>
    <?php require_once("header.php"); ?>

</head>

<body>
    <main id="admin">

        <h1 class="text-logo">ADMINISTRATION</h1>
        <h4>Bonjour <?php echo $_SESSION['username']; ?> <a href="admin.php?deconnexion=true" class="btn btn-success btn-lg">Déconnexion</a></h4>

        <div class="container admin">
            <div class="row">
                <h1>
                    <strong>Liste des items </strong>
                    <a href="insert.php" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a>
                </h1>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Année de sortie</th>
                            <th>Réalisateur</th>
                            <th>Âge du réalisateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php
                        require 'database.php';
                        
                        $db = Database::connect();
                        $statement = $db->query('SELECT
                        films.ID,
                        films.titre,
                        films.realisateur,
                        films.annee,
                        realisateurs.prenom AS prenom,
                        realisateurs.nom AS nom,
                        realisateurs.age AS age
                        FROM films LEFT JOIN realisateurs
                        ON films.realisateur = realisateurs.ID
                        ORDER BY films.titre DESC');

                        while($item = $statement->fetch()) {
                            echo '<tr>';
                            echo '<td>'. $item['titre'] . '</td>';
                            echo '<td>'. $item['annee'] . '</td>';
                            echo '<td>'. $item['prenom'] . ' ' . $item['nom'] . '</td>';
                            echo '<td>'. $item['age'] . ' ans' . '</td>';
                            echo '<td width=340>';
                            echo '<a class="btn btn-secondary" href="view.php?id='.$item['ID'].'"><span class="bi-eye"></span> Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id='.$item['ID'].'"><span class="bi-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['ID'].'"><span class="bi-x"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>

                </table>
            </div>
        </div>
    </main>

</body>

</html>