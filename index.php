<!doctype html>
<?php
session_start();
?>

<html lang="pt-br">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Biblioteca</title>
  <link rel="icon" href="imagem/favicon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/signin.css">
</head>

<body class="text-center">
  <form class="form-signin" action="valida_login.php" method="post">
    <img class="mb-4" src="imagem/logo.png" alt="Celke" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Área Restrita</h1>

    <div class="form-group">
      <label>E-mail:</label>
      <input type="text" name="inputEmail" class="form-control" placeholder="nome@exemplo.com">
    </div>
    <div class="form-group">
      <label>Senha:</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="******">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer login</button>
    <p class="text-center">Esqueceu a senha?</p>
  </form>
  <p class="text-center text-danger">
    <?php
    if (isset($_SESSION['login_error'])) {
      echo $_SESSION['login_error'];
      unset($_SESSION['login_error']);
    }
    ?>
  </p>
</body>

</html>