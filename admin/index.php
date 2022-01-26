<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Administration de la BDD</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="160carac">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <main id="admin">

        <h1 class="text-logo">ADMINISTRATION</h1>

        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des items </strong><a href="insert.php" class="btn btn-success btn-lg"><span
                            class="bi-plus"></span> Ajouter</a></h1>
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
                        $statement = $db->query('SELECT films.ID, films.titre, films.realisateur, films.annee, realisateurs.prenom AS prenom, realisateurs.nom AS nom, realisateurs.age AS age FROM films LEFT JOIN realisateurs ON films.realisateur = realisateurs.ID ORDER BY films.titre DESC');
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