<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['cpf']))
    {
      $_SESSION['msg'] = 'Faça o Login para continuar!';
      header("Location: index.php");
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor_new/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor_new/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor_new/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Dash</span><strong class="text-primary">Express</strong></div>
            <form method="POST" action="processaUsuario.php" class="text-left form-validate">
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerCPF" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">CPF:</label>
              </div>
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerType" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Tipo de Usuário:</label>
              </div>
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerPName" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Nome:</label>
              </div>
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerUName" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Sobrenome:</label>
              </div>
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerMatricula" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Matrícula:</label>
              </div>
              <div class="form-group-material">
                <input id="register-email" type="email" name="registerEmail" required data-msg="Please enter a valid email address" class="input-material">
                <label for="register-email" class="label-material">Email:      </label>
              </div>
              <div class="form-group-material">
                <input id="register-password" type="text" name="registerPassword" required data-msg="Please enter your password" class="input-material">
                <label for="register-password" class="label-material">Senha:        </label>
              </div>
              <div class="form-group terms-conditions text-center">
                <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="form-control-custom">
                <label for="register-agree">Eu concordo com a política de termos</label>
              </div>
              <div class="form-group text-center">
                <input id="register" type="submit" value="Cadastrar" class="btn btn-primary">
              </div>
            </form>
            <small>Já possui uma conta? </small>
            <a href="login.php" class="signup">Logar</a>
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor_new/jquery/jquery.min.js"></script>
    <script src="vendor_new/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor_new/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor_new/chart.js/Chart.min.js"></script>
    <script src="vendor_new/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor_new/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>