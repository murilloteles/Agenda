<html>
<meta charset="UTF-8">
<body>
<?php	
	require 'vendor/autoload.php';
	require 'config/database.php';
	include_once('models/Contato.php');

	$nome = isset($_POST['nome'])?$_POST['nome'] :'';
	$tel = isset($_POST['tel'])?$_POST['tel'] : '';
	$end = isset($_POST['end'])?$_POST['end'] : '';
	$erro = 0;
	$erros = array();



	if(empty($nome) OR empty(trim($nome))){
		$erros['nome'] = "Preencha corretamente o seu nome!";
		$erro = 1;
	}elseif(strstr($nome," ") == FALSE ){
		$erros['nome'] = "Preencha com o nome completo!";
		$erro = 1;
	}elseif(strlen($nome) > 50){
		$erros['nome'] = "Nome muito grande, preencher com menos de 50 caracteres!";
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
	
	if($erro == 0 && isset($_REQUEST['idAluno'])){
		
		$contato = Contato::find($_REQUEST['idAluno']);
		$contato -> nome = $nome;
		$contato -> telefone = $tel;
		$contato -> endereco = $end;
		$contato -> id_usuario = $_SESSION['id_usuario'];		 
		$contato->save();

		header("Location: listar.php");

	}elseif($erro == 0){
		 $contato = new Contato;
		 $contato -> nome = $nome;
		 $contato -> telefone = $tel;
		 $contato -> endereco = $end;
		 $contato -> id_usuario = $_SESSION['id_usuario'];
		 
		 $contato->save();
		 
		 header("Location: listar.php");
	}
?>
</body>
</html>