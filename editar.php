<html lang="pt-br">

<header>
	<meta charset= "UTF-8"/>
	<title>Alterar Contatos</title>

     <!-- Css Bootstrap -->
    <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Js Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
</head>
<body class="panel-footer">
  
<?php

	if(isset($_REQUEST['idAluno'])){
		include 'conexao.php';
	
		$idAluno = $_REQUEST['idAluno'];
	
		$seleciona = mysql_query("SELECT * FROM CONTATO WHERE id = '$idAluno'");
	
		$contato = mysql_fetch_array($seleciona);
	}

  if(isset($_POST["alterar"])){ 
    include 'validaAlt.php'; 
  }

  $erroN = isset($erros['nome'])? $erros['nome'] : "";
  $erroT = isset($erros['tel'])? $erros['tel'] : "";
  $erroE = isset($erros['end'])? $erros['end'] : ""; 
?>

  <div class="col-md-7 col-md-offset-3">
  <div class="panel panel-primary">
  <div class="panel-heading" align="center">
    <h4>Alterar contato</h4>
  </div>

  <div class="panel-body">
  <form class="form-horizontal" method ="post" action="#">

  <div class="form-group">
    <label for="nome" class="col-md-3 control-label">Nome:</label>
    <div class="col-md-5">
      <input type="text" class="form-control input-sm" name="nome" width="auto" value="<?php echo $contato['nome']; ?>">
    </div>
    <div class="col-md-3">
      <p class="text-danger"> <?php echo $erroN; ?> </p>
    </div>
  </div>

  <div class="form-group">
    <label for="telefone" class="col-md-3 control-label">Telefone:</label>
    <div class="col-md-5">
      <input type="text" class="form-control input-sm" name="tel" value="<?php echo $contato['telefone']; ?>">
    </div>
  <div class="col-md-3">
      <p class="text-danger"> <?php echo $erroT; ?> </p>
  </div>
  </div>
  
  <div class="form-group">
    <label for="endereco" class="col-md-3 control-label">Endereço:</label>
    <div class="col-md-5">
    <textarea class="form-control" name="end" rows=3><?php echo $contato['endereco'];?></textarea>
    </div>
  <div class="col-md-3">
      <p class="text-danger"> <?php echo $erroE; ?> </p>
  </div>
  </div>
 
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="submit" name="alterar" class="btn btn-warning btn-default">Alterar</button>
      <a href="listar.php"><button type="button" name="cancelar" class="btn btn-danger btn-default">Cancelar</button></a>
    </div>
  </div>

</form>
</div>
</div>
</div>

</body>
</html>