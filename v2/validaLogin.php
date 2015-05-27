<?php
	require 'vendor/autoload.php';
	require 'config/database.php';
	require 'models/Usuario.php';
	include 'config/CreateTables.php';

	$senhaCriptografada = sha1($_SESSION['senha']);

	$usuario = Usuario::where('usuario','=',$_SESSION["usuario"]) 
				-> where('senha','=',$senhaCriptografada)
				-> first();

	if($usuario != null){
		$_SESSION['id_usuario'] = $usuario -> id;
		header('Location: home.php');
	}else{
		$erro = "Usario e/ou senha incorretos.";
		unset($_SESSION['usuario']);
		unset($_SESSION['senha']);
	}

?>