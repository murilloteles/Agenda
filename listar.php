<html lang="pt-br">
<header>
	<meta charset= "UTF-8"/>
	<title>Listagem de Contatos</title>

    <!-- Css Bootstrap -->
    <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Js Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class='jumbotron' align='center'>
		<h2>Aqui estão todos seus contatos!</h2>
		<p><a href='index.php'><button class='btn btn-info'>Cadastre</button></a> agora um novo contato!</p>
	</div>

	<div class='col-md-7 col-md-offset-3'>
	<div class='panel panel-primary'>
	<div class='panel-heading' align='center'>
		<h4>Listagem de contatos</h4>
	</div>

	<div class='panel-body'>
		
<?php
		include 'conexao.php';
		
		if(isset($_REQUEST['deletar']) && isset($_REQUEST['idAluno'])){
			$deleta = mysql_query("DELETE FROM CONTATO WHERE id = '".$_REQUEST['idAluno']."'");
		}
		
   		$sql_select = "SELECT * FROM CONTATO";
		$result_select = mysql_query($sql_select);
		  
		 while($linha =  mysql_fetch_array($result_select)){
				echo"<table border ='1' class='table-striped table-bordered table-condensed' align='center'>
					 <caption>Contato ".$linha['id'].":</caption>
						<tr>
							<td width='200'><label for='nome'>Nome:</label></td>
							<td width='200'>".$linha['nome']."</td>
						</tr>	
						<tr>
							<td width='200'><label for='tel'>Telefone:</label></td>
							<td width='200'>".$linha['telefone']."</td>
						</tr>
						<tr>
							<td width='200'><label for='end'>Endereço:</label></td>
							<td width='200'>".$linha['endereco']."</td>
						</tr>
						<tr>
							<td colspan='2' align='middle'>
								<a href='editar.php?&idAluno=".$linha["id"]."'><button type='submit' class='btn btn-warning btn-xs'>Editar</button></a> 
								<a href='listar.php?&deletar=sim&idAluno=".$linha["id"]."'><button type='submit' class='btn btn-danger btn-xs'>Excluir</button></a>
							</td>
						</tr>
						</table><br/>";
			 }
		 
?>
</div>
</div>
</div>
</body>
</html>