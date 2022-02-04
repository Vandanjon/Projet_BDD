<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Reporting Tool V</title>
  <?php require_once("php/header.php"); ?>
</head>

<body>
  <main>

  <!-- LOGIN -->
    <form action="php/verification.php" method="POST">
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