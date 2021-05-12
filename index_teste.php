<!doctype html>
<?php
session_start();
?>

<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Biblioteca</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" action="valida_login.php" method="POST">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>
    <input type="email" id="inputEmail" class="form-control" placeholder="nome@exemplo.com" required autofocus>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
    <!---<div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar
      </label>
    </div>--->
    <input class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>
</body>

</html>