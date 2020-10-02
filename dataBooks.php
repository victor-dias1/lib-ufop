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
			$('#listar-livros').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "processDataBooks.php",
					"type": "POST"
				}
			});
		} );
		</script>
	</head>
	<body>
		<h1>Livros</h1>
		<table id="listar-livros" class="display" style="width:100%">
			<thead>
				<tr>
					<th>id</th>
					<th>Nome</th>
					<th>Autor</th>
					<th>Edição</th>
				</tr>
			</thead>
		</table>	
	</body>
</html>
