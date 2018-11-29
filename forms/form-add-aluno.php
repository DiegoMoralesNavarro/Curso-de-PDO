
<form action="../database/alunos/create.php" method="POST" class="row">

	<div class="input-field col s12">
		<input id="nome" type="text" name="nome" class="validate" required="" >
    	<label for="nome">Digite o nome</label>
	</div>

	<div class="input-field col s12">
		<input id="tel" type="tel" name="tel" class="validate" required="" >
    	<label for="tel">Digite o telefone</label>
	</div>

	<div class="input-field col s12">
		<input id="email" type="email" name="email" class="validate" required="" >
    	<label for="email">Digite o email</label>
	</div>

	<div class="input-field col s12">
		<input id="modalidade" type="text" name="modalidade" class="validate" required="" value="<?php echo $modalidade ?>">
	</div>

	<div class="input-field col s12">
		<input type="submit" name="" value="cadastrar" class="btn">
		<a href="modalidades.php" class="btn red">Cancelar</a>
	</div>

	
</form>