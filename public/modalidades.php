
<?php
session_start();
 require_once "../config/header.inc.php";
 ?>


<div class="row container">
	<div class="col s12">
		<h5 class="ligth">Cadastro de modalidade</h5><br>

		<?php
		if(isset($_SESSION['sucesso'])):
			echo "<p class='center green lighten-2 white-tect'> SUCESSO </p>" ;
				echo $_SESSION['sucesso'];
				unset($_SESSION['sucesso']);
			echo "</p>";

		elseif(isset($_SESSION['erro'])):
			echo "<p class='center red lighten-2 white-tect'>";
				echo $_SESSION['erro'];
				unset($_SESSION['erro']);
			echo "</p>";

		endif;
		 
		 ?>

		 <?php require_once "../forms/form.add.mod.php";  ?>

	</div>
</div>


<div class="row container">
	<div class="col s12">
		<h5 class="ligth">Modalidade cadastrada</h5><br>

		<table class="striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Modalidade</th>
					<th>Mensalidade</th>
				</tr>
			</thead>
			<tbody>
				<?php require_once "../database/modalidades/read.php"; ?>
			</tbody>
		</table>

	</div>
</div>














<?php require_once "../config/footer.inc.php"; ?>