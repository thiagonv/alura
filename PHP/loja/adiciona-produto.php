<?php include("cabecalho.php"); ?>
	<?php
		$nome = $_GET["nome"];
		$preco = $_GET["preco"];
	?>
	Produto <?= $nome; ?> com valor R$ <?= $preco ?> adicionado com sucesso!
<?php include("rodape.php"); ?>