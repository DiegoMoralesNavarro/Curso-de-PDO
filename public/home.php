
<?php 
require_once "../config/header.inc.php";
?>

<div class="row container">
	<div class="col s12">
		<br>
		<?php require_once "../forms/form-consulta.php"; ?>

		<table class="striped">
			<thead>
				<tr>
					<th>nome</th>
					<th>telefone</th>
					<th>email</th>
					<th>modalidade</th>
					<th>mensalidade</th>
				</tr>
			</thead>
			<tbody>
				<?php require_once "../database/alunos/read.php"; ?>
			</tbody>
		</table>
	</div>
</div>



<?php require_once "../config/footer.inc.php"; ?>