<?php require_once "../config/header.inc.php"; ?>


<div class="row container">
	<div class="col s12">
		<h5 class="ligth">Cadastro de Alunos</h5><br>

		<?php
			$modalidade = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

			require_once "../forms/form-add-aluno.php";

		?>
	</div>
</div>



<?php require_once "../config/footer.inc.php"; ?>