<?php 
require_once "../config/header.inc.php";
?>


<div class="row container">
	<div class="col s12">
		<h5 class="ligth"> Editar Aluno</h5>
		<?php
			require_once "../classes/autoload.php";

			$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

			$editAluno = new Alunos();
			$editAluno->dadosDaTabela($id);

		?>
	</div>
</div>



<?php require_once "../config/footer.inc.php"; ?>