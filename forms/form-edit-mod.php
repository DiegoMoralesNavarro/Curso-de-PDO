

<form action="../database/modalidades/update.php" method="POST">
	<div class="input-field col s12">
		<input id="id" type="hidden" name="id" value="<?php echo $value['id'] ?>" >
	</div>
	<div class="input-field col s12">
		<input id="modalidade" type="text" name="modalidade" value="<?php echo $value['modalidade']  ?>">
    	<label for="modalidade">Digite a modalidade</label>
	</div>
	<div class="input-field col s12">
		<input id="mensalidade" type="number" name="mensalidade" step="0.10" min="0.0" value="<?php echo $value['mensalidade']  ?>">
    	<label for="mensalidade">Valor da mensalidade</label>
	</div>

	<div class="input-field col s12">
		<input type="submit" value="alterar" name="" class="btn">
		<a href="modalidades.php" class="btn red">Cancelar</a>
	</div>
</form>