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
		<div class="card-body">
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
	</body>
</html>
