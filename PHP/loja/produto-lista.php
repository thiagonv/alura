<?php 
require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("logica-usuario.php");

?>

<div class="container">
<div class="principal">
<h1>Lista de Produtos</h1>
	
<?php 
	if(isset($_SESSION["success"])) {
?>
	<p class="alert-success"><?=$_SESSION["success"]?></p>
<?php
	unset($_SESSION["success"]);
	}
?>
	

<?php
	$produtos = listaProdutos($conexao);
?>
	
	<table class="table table-bordered  table-hover table-striped table-condensed">
		<thead>
			<tr>
				<td>Produto</td>
				<td>Valor</td>
				<td>Descrição</td>
				<td>Categoria</td>
				<td colspan="2">O que deseja fazer?</td>
			</tr>
		</thead>	
		<tbody>
		<?php
			foreach ($produtos as $produto):
		?>
				<tr>
					<td><?=$produto['nome']?></td>
					<td><?=$produto['preco']?></td>
					<td><?=substr($produto['descricao'],0,30)?></td>
					<td><?=$produto['categoria_nome']?></td>
					<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">Alterar</a></td>
					<td>
						<form action="remove-produto.php" method="post">
							<input type="hidden" name="id" value="<?=$produto['id']?>" />
							<button class="btn btn-danger">Remover</button>
						</form>	
					</td>
				</tr>
		</tbody>	
		<?php
			endforeach
		?>
	</table>
	
<?php require_once("rodape.php"); ?>