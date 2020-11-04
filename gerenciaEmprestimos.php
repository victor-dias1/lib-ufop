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
		<title>Biblioteca</title>
		<link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			function abrir() {
				document.getElementById('popUp').style.display = 'block';
			}

			function fechar() {
				document.getElementById('popUp').style.display = 'none';
			}
		</script>
		<script>
			$(document).ready(function() {
				$('#listar-emprestimos').DataTable({
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
						"url": "processaListaEmprestimos.php",
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
		<h1>Emprestimos</h1>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="table-responsive">
						<table id="listar-emprestimos" class="display" style="width:100%">
							<thead>
								<tr>
                                    <th>Matrícula</th>
									<th>Código Exemplar</th>
									<th>Data Empréstimo</th>
									<th>Data Devolução</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="float-right">
				<a class="btn btn-primary" href="cadastraNovoEmprestimo.php" role="button">Realizar Emprestimo</a>
				<a class="btn btn-danger" href="javascript: abrir();" role="button">Deletar Emprestimo</a>
				<div id="popUp" class="modal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Código do Exemplar</p>
								<form method="POST" action="processaDeletarEmprestimo.php">
									<p><input type="text" name="codExemplar">
										<p><input type="submit" value="Excluir" class="btn btn-danger" role="button"></p>
								</form>
							</div>
							<div class="modal-footer">
								<a class="btn btn-primary" href="javascript: fechar();" role="button">Cancelar</a>
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
			<?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
		</div>
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
					<li><a href="gerenciaUsuarios.php"> <i class="icon-form"></i>Usuários                                             </a></li>
					<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Livros</a>
					<ul id="exampledropdownDropdown" class="collapse list-unstyled ">
						<li><a href="gerenciaLivros.php">Gerência</a></li>
						<li><a href="gerenciaEmprestimos.php">Empréstimos</a></li>
						<li><a href="gerenciaReservas.php">Reservas</a></li>
					</ul>
					</li>
				</ul>
				</div>
			</div>
		</nav>
	</body>
</html>