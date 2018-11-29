
<form action="../database/alunos/update.php" method="POST" class="row">

	<div class="input-field col s12">
		<input id="id" type="hidden" name="id" value="<?php echo $id ?>">
	</div>

	<div class="input-field col s12">
		<input id="nome" type="text" name="nome" value="<?php echo $value['nome']  ?>">
    	<label for="nome">Digite o nome</label>
	</div>

	<div class="input-field col s12">
		<input id="tel" type="tel" name="tel" value="<?php echo $value['tel']  ?>">
    	<label for="tel">Digite o telefone</label>
	</div>

	<div class="input-field col s12">
		<input id="email" type="email" name="email" value="<?php echo $value['email']  ?>">
    	<label for="email">Digite o email</label>
	</div>

	<div class="input-field col s12">
		<input id="modalidade" type="text" name="modalidade" value="<?php echo $value['modalidade']  ?>">
    	<label for="modalidade">Digite a modalidade</label>
	</div>

	<div class="input-field col s12">
		<input type="submit" value="alterar" name="" class="btn">
		<a href="home.php" class="btn red">Cancelar</a>
	</div>

</form>