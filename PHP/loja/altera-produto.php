<?php include("cabecalho.php");
		include("conecta.php");
		include("banco-produto.php");

?>

<div class="container">
<div class="principal">

<?php
		$nome = $_POST["nome"];
		$preco = $_POST["preco"];
		$descricao = $_POST["descricao"];
		$categoria_id = $_POST['categoria_id'];
		$id = $_POST['id'];
		if(array_key_exists('usado', $_POST)) {
			$usado = "true";
		} else {
			$usado = "false";
		}
		
		if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) { 
	?>
			<p class="alert-success">Produto <?= $nome; ?> com valor R$ <?= $preco ?> alterado com sucesso!</p>
		<?php 
		} else { 
			$msg = mysqli_error($conexao);
		?>
			<p class="alert-danger">Produto <?= $nome; ?> não foi alterado: <?= $msg ?></p>	
		<?php
		}
		?>
<?php include("rodape.php"); ?>