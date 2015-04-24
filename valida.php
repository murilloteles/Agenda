<html>
<meta charset="UTF-8">
<body>
<?php

	include 'conexao.php';
	
	$nome = isset($_POST['nome'])?$_POST['nome'] :'';
	$tel = isset($_POST['tel'])?$_POST['tel'] : '';
	$end = isset($_POST['end'])?$_POST['end'] : '';
	$erro = 0;
	$erros = array();

	if(empty($nome) OR empty(trim($nome)) OR strstr($nome," ") == FALSE ){
		$erros['nome'] = "Preencha corretamente o seu nome!";
		$erro = 1;
	}
	
	if(empty($tel) OR !is_numeric($tel) OR strlen($tel) < 8 OR strstr($tel," ") != FALSE){
		$erros['tel'] = "Preencha corretamente o seu telefone!";
		$erro = 1;
	}
	
	if(empty($end) OR empty(trim($end)) OR strstr($end," ") == FALSE){
		$erros['end'] = "Preencha corretamente o seu endereço!";
		$erro = 1;
	}
	
	if($erro == 0){		 
		 $sql_insert = "INSERT INTO CONTATO(nome,telefone,endereco) VALUES";
		 $sql_insert = $sql_insert."('$nome','$tel','$end')";
		 $result_insert = mysql_query($sql_insert);
		 
		 header("Location: listar.php");
	}
?>
</body>
</html>