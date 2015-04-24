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

	if(isset($_POST['cadastrar'])){
 		include 'valida.php'; 
	}

	$nome = isset($_POST['nome'])? $_POST['nome'] : "";
	$tel = isset($_POST['tel'])? $_POST['tel'] : "";
	$end = isset($_POST['end'])? $_POST['end'] : "";
	$erroN = isset($erros['nome'])? $erros['nome'] : "";
	$erroT = isset($erros['tel'])? $erros['tel'] : "";
	$erroE = isset($erros['end'])? $erros['end'] : "";

	?>
 
	<div class="jumbotron" align="center">
		<h2>Seja Bem vindo a Agenda On-line!</h2>
		<p>Voce pode <a href="listar.php"><button class="btn btn-info">Listar</button></a> os seus contatos diretamente!</p>
	</div>
	<div class="col-md-7 col-md-offset-3">
	<div class="panel panel-primary">
	<div class="panel-heading" align="center">
		<h4>Cadastro de contatos</h4>
	</div>

	<div class="panel-footer">
	<form class="form-horizontal" method ="post" action="#">

	<div class="form-group">
		<label for="nome" class="col-md-3 control-label">Nome:</label>
		<div class="col-md-5">
			<input type="text" class="form-control input-sm" name="nome" width="auto" value="<?php echo $nome; ?>">
		</div>
		<div class="col-md-3">
			<p class="text-danger"> <?php echo $erroN; ?> </p>
		</div>
	</div>

  <div class="form-group">
    <label for="telefone" class="col-md-3 control-label">Telefone:</label>
    <div class="col-md-5">
      <input type="text" class="form-control input-sm" name="tel" value="<?php echo $tel; ?>">
    </div>
	<div class="col-md-3">
			<p class="text-danger"> <?php echo $erroT; ?> </p>
	</div>
  </div>
  
  <div class="form-group">
    <label for="endereco" class="col-md-3 control-label">Endereço:</label>
    <div class="col-md-5">
	  <textarea class="form-control" name="end" rows=3><?php echo $end; ?></textarea>
    </div>
	<div class="col-md-3">
			<p class="text-danger"> <?php echo $erroE; ?> </p>
	</div>
  </div>
 
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="submit" name="cadastrar" class="btn btn-primary btn-default">Cadastrar</button>
    </div>
  </div>

</form>
</div>
</div>
</div>
</body>
</html>