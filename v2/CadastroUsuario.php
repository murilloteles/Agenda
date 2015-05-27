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
 		include 'validaUsuario.php'; 
	}

	$usuario = isset($_POST['usuario'])?$_POST['usuario'] :'';
	$senha = isset($_POST['senha'])?$_POST['senha'] : '';
	$confirmaSenha = isset($_POST['confirmaSenha'])?$_POST['confirmaSenha'] : '';
	$erroU = isset($erros['usuario'])? $erros['usuario'] : "";
	$erroS = isset($erros['senha'])? $erros['senha'] : "";
	$erroCS = isset($erros['confirmaSenha'])? $erros['confirmaSenha'] : "";

	?>
 
	<div class="col-md-7 col-md-offset-3">
	<div class="panel panel-primary">
	<div class="panel-heading" align="center">
		<h4>Cadastro de Usuários</h4>
	</div>

	<div class="panel-footer">
	<form class="form-horizontal" method ="post" action="#">

	<div class="form-group">
		<label for="nome" class="col-md-3 control-label">Usuário:</label>
		<div class="col-md-5">
			<input type="text" class="form-control input-sm" name="usuario" width="auto" value="<?php echo $usuario; ?>">
		</div>
		<div class="col-md-3">
			<p class="text-danger"> <?php echo $erroU; ?> </p>
		</div>
	</div>

  <div class="form-group">
    <label for="telefone" class="col-md-3 control-label">Senha:</label>
    <div class="col-md-5">
      <input type="password" class="form-control input-sm" name="senha" value="<?php echo $senha; ?>">
    </div>
	<div class="col-md-3">
			<p class="text-danger"> <?php echo $erroS; ?> </p>
	</div>
  </div>
  
  <div class="form-group">
    <label for="endereco" class="col-md-3 control-label">Confirme a Senha:</label>
    <div class="col-md-5">
		<input type="password" class="form-control input-sm" name="confirmaSenha" value="<?php echo $confirmaSenha; ?>">
    </div>
	<div class="col-md-3">
			<p class="text-danger"> <?php echo $erroCS; ?> </p>
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