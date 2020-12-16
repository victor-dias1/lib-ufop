<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>َLogin</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <form class="box" action="valida_login.php" method="post">
    <h1>Login</h1>
    <input type="text" name="inputEmail" placeholder="Username">
    <input type="password" name="inputPassword" placeholder="Password">
    <input type="submit" name="" value="Login">
  </form>
</body>

</html>