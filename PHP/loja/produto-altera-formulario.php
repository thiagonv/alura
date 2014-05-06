<?php 
require_once("cabecalho.php"); 
require_once("banco-categoria.php"); 
require_once("banco-produto.php");
?>

<div class="container">
<div class="principal">

<?php
$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);

$usado = $produto['usado'] ? "checked='checked'" : "";
?>

	<h1>Alterando produto</h1>

	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto['id']?>" />
		<table class="table">
			
			<?php require_once("produto-formulario-base.php"); ?>

		</table>
	</form>

<?php require_once("rodape.php"); ?>