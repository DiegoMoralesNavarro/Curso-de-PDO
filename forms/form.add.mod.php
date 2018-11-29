

<form action="../database/modalidades/create.php" method="POST" class="row">
	<div class="input-field col s12">
		<input id="modalidade" type="text" name="modalidade" class="validate" required="" data-length="20">
    	<label for="modalidade">Digite a modalidade</label>
	</div>
	<div class="input-field col s12">
		<input id="mensalidade" type="number" name="mensalidade" class="validate" step="0.10" min="0.0" required="">
    	<label for="mensalidade">Valor da mensalidade</label>
	</div>
	<div class="input-field col s12">
		<input type="submit" value="cadastar" name="" class="btn">
		<input type="reset" value="limpar" name="" class="btn red">
	</div>
</form>
