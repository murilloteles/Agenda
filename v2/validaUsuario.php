<html>
<meta charset="UTF-8">
<body>
<?php	
	require 'vendor/autoload.php';
	require 'config/database.php';
	include_once('models/Usuario.php');
	include 'config/CreateTables.php';
	
	$usuario = isset($_POST['usuario'])?$_POST['usuario'] :'';
	$senha = isset($_POST['senha'])?$_POST['senha'] : '';
	$confirmaSenha = isset($_POST['confirmaSenha'])?$_POST['confirmaSenha'] : '';
	$erro = 0;
	$erros = array();

	if(empty($usuario) OR empty(trim($usuario))){
		$erros['usuario'] = "Preencha corretamente nome de usuario!";
		$erro = 1;
	}elseif(strlen($usuario) > 20){
		$erros['usuario'] = "Nome de usuario muito grande, preencher com menos de 20 caracteres!";
		$erro = 1;
	}elseif(strlen($usuario) < 8){
		$erros['usuario'] = "Nome de usuario muito curto, minimo de 8 caracteres!";
		$erro = 1;
	}
	
	if(empty($senha) OR empty(trim($senha))){
		$erros['senha'] = "Preencha corretamente a senha!";
		$erro = 1;
	}elseif(strlen($senha) > 20){
		$erros['senha'] = "Senha muito grande, preencher com menos de 20 caracteres!";
		$erro = 1;
	}elseif(strlen($senha) < 8){
		$erros['senha'] = "Senha muito curta, minimo de 8 caracteres!";
		$erro = 1;
	}
	
	if($senha != $confirmaSenha){
		$erros['confirmaSenha'] = "Confirmação diferente de senha!";
		$erro = 1;
	}
	
	if($erro == 0){
		$senhaCriptografada = sha1($senha);
		$usuarios = new Usuario;
		$usuarios -> usuario = $usuario;
		$usuarios -> senha = $senhaCriptografada;		 
		$usuarios->save();

		header("Location: index.php");
	}
?>
</body>
</html>