<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['cpf']))
    {
      $_SESSION['msg'] = 'Faça o Login para continuar!';
      header("Location: index.php");
    }
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="description" content="">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="robots" content="all,follow">
		<title>Biblioteca</title>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-usuario').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "processDataUsers.php",
					"type": "POST"
				}
			});
		} );
		</script>
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
		<h1>Usuários</h1>
		<table id="listar-usuario" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>Matrícula</th>
				</tr>
			</thead>
		</table>
		<!-- Side Navbar -->
		<nav class="side-navbar">
      		<div class="side-navbar-wrapper">
        	<!-- Sidebar Header    -->
        	<div class="sidenav-header d-flex align-items-center justify-content-center">
          	<!-- User Info-->
          	<div class="sidenav-header-inner text-center"><img src="img/avatar-7.jpeg" alt="person" class="img-fluid rounded-circle">
            	<h2 class="h5">Victor Dias</h2><span>Web Developer</span>
          	</div>
          	<!-- Small Brand information, appears on minimized sidebar-->
          	<div class="sidenav-header-logo"><a href="main.php" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        	</div>
        	<!-- Sidebar Navigation Menus-->
        	<div class="main-menu">
          	<h5 class="sidenav-heading">Menu</h5>
          	<ul id="side-main-menu" class="side-menu list-unstyled">                  
            	<li><a href="main.php"> <i class="icon-home"></i>Página Inicial                                            </a></li>
            	<li><a href="forms.php"> <i class="icon-form"></i>Cadastrar Livro                                             </a></li>
            	<li><a href="emprestimo.php"> <i class="icon-form"></i>Realizar Empréstimo                                </a></li>
            	<li><a href="tables.php"> <i class="icon-grid"></i>Listar Empréstimos                                                 </a></li>
            	<li><a href="index.php"> <i class="icon-interface-windows"></i>Página de Login                              </a></li>
         	</ul>
        	</div>
      		</div>
		</nav>
		  <!-- Breadcrumb-->
		  <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="main.php">Página Inicial</a>
            </li>
            <li class="breadcrumb-item active">Tabelas </li>
          </ul>
        </div>
	  </div>
	  <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2020</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
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
