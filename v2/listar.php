<?php
session_start();

if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}
?>
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

	<?php

	if(isset($_REQUEST['logout'])){
		 session_destroy();
		header('Location: index.php');
	}
	?>
	<div align="right">
		<h4><p class="text-primary"><?php echo $_SESSION['usuario']; ?>
		<a href='listar.php?&logout=sim'><button type="button" class="btn btn-warning" aria-label="right Align">
	  		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
		</button></a></p></h4>
	</div>

	<div class='jumbotron' align='center'>
		<h2><?php echo $_SESSION['usuario']; ?>, Aqui estão todos seus contatos!</h2>
		<p><a href='home.php'><button class='btn btn-info'>Cadastre</button></a> agora um novo contato!</p>
	</div>

	<div class='col-md-7 col-md-offset-3'>
	<div class='panel panel-primary'>
	<div class='panel-heading' align='center'>
		<h4>Listagem de contatos</h4>
	</div>

	<div class='panel-body'>
		
<?php
	require 'vendor/autoload.php';
	require 'config/database.php';
	require 'models/Contato.php';
		
		if(isset($_REQUEST['deletar']) && isset($_REQUEST['idAluno'])){
			Contato::destroy($_REQUEST['idAluno']);
		}
		
   		$result = Contato::where('id_usuario','=',$_SESSION['id_usuario']) ->get();
		
		$contato = 0;
		foreach($result as $linha){
			$contato += 1;
				echo"<table border ='1' class='table-striped table-bordered table-condensed' align='center'>
					 <caption>Contato ".$contato.":</caption>
						<tr>
							<td width='200'><label for='nome'>Nome:</label></td>
							<td width='200'>".$linha -> nome."</td>
						</tr>	
						<tr>
							<td width='200'><label for='tel'>Telefone:</label></td>
							<td width='200'>".$linha -> telefone."</td>
						</tr>
						<tr>
							<td width='200'><label for='end'>Endereço:</label></td>
							<td width='200'>".$linha -> endereco."</td>
						</tr>
						<tr>
							<td colspan='2' align='middle'>
								<a href='editar.php?&idAluno=".$linha["id"]."'><button type='submit' class='btn btn-warning btn-xs'>Editar</button></a> 
								<a href='listar.php?&deletar=sim&idAluno=".$linha["id"]."'><button type='submit' class='btn btn-danger btn-xs'>Excluir</button></a>
							</td>
						</tr>
						</table><br/>";
		}
		
		if($contato == 0 ){
			echo "<div class='alert alert-warning' role='alert' align='center'>Ainda não há nenhum dado cadastrado...</div>";
		}
		 
?>
</div>
</div>
</div>
</body>
</html>