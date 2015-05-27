<?php
	session_start();
?>
<html>
<head>
	<meta charset= "UTF-8"/>
	<title>Agenda Online</title>

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
		if(isset($_POST['entrar'])){
			$_SESSION['usuario'] = $_POST['usuario'];
			$_SESSION['senha'] = $_POST['senha'];
			include('validaLogin.php');
		}
	?>
	<div class="jumbotron" align="center">
		<h2>Ainda não é cadastrado?</h2>
		<p>Cadastre-se<a href="CadastroUsuario.php"><button class="btn btn-info">aqui</button></a></p>
	</div>

	<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
	<div  class="panel panel-footer">
		<form class = "form-horizontal" method ="post" action="#">
			<h3 class="form-signin-heading" align="center">Login</h3>
			<div class="form-group">
				<input type="text" class="form-control" name="usuario" placeholder="Usuario"/>
				<input type="password" class="form-control" name="senha" placeholder="senha"/>
			</div>
			<div class="form-group">
			<div class="col-md-offset-5">
				<button type="submit" name="entrar" class="btn btn-lg btn-primary">Entrar</button>				
			</div>
			</div>
		</form>	
		<p class="text-danger">
		<?php
			if(isset($erro)){
				echo $erro;
			}
		?></p>
	</div>
	</div>
	</div>
	
</body>
</html>