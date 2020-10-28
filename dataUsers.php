<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['cpf'])) {
	$_SESSION['msg'] = 'Faça o Login para continuar!';
	header("Location: index.php");
}
?>

<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Biblioteca</title>
	<link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script src="https//code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		function abrir(){
			document.getElementById('popUp').style.display = 'block';
		}
		function fechar(){
			document.getElementById('popUp').style.display = 'none';
		}

	</script>	
	<script>
		$(document).ready(function() {
			$('#listar-usuario').DataTable({
				"language": {
					"lengthMenu": "Mostrando _MENU_ registros por página",
					"zeroRecords": "Nada encontrado",
					"info": "Mostrando página _PAGE_ of _PAGES_",
					"infoEmpty": "Nenhum registro disponível",
					"infoFiltered": "(filtrado de _MAX_ registros no total)"
				},
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "processDataUsers.php",
					"type": "POST"
				}
			});
		});
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
	<!-- Tweaks for older IEs-->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
	<h1>Usuários</h1>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="table-responsive">
					<table id="listar-usuario" class="display">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Sobrenome</th>
								<th>Matrícula</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<a class="btn btn-primary" href="register.php" role="button">Cadastrar Usuário</a>
			<a class="btn btn-danger" href="javascript: abrir();" role="button">Deletar Usuário</a>
			<div id="popUp" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" href="javascript: fechar();">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Matrícula</p>
							<form method="POST" action="processDeleteUsers.php">
								<p><input type="text" name="matricula">
								<p><input type="submit" value="Excluir" class="btn btn-danger" role="button"></p>
							</form>	
						</div>
						<div class="modal-footer">
							<a class="btn btn-primary" href="javascript: fechar();" role="button">Cancelar</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
	</div>
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
					<li><a href="main.php"> <i class="icon-home"></i>Página Inicial </a></li>
					<li><a href="dataUsers.php"> <i class="icon-form"></i>Usuários </a></li>
					<li><a href="dataBooks.php"> <i class="icon-form"></i>Livros </a></li>
				</ul>
			</div>
		</div>
	</nav>
</body>

</html>