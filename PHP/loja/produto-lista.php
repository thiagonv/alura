<?php include("cabecalho.php"); 
		include("conecta.php"); 
		include("banco-produto.php");

?>

<div class="container">
<div class="principal">
<h1>Lista de Produtos</h1>
	
<?php 
	if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') {
?>
	<p class="alert-success">Produto removido com sucesso.</p>
<?php
	}
?>
	

<?php
	$produtos = listaProdutos($conexao);
?>
	
	<table class="table table-bordered  table-hover table-striped">
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
	
<?php include("rodape.php"); ?>