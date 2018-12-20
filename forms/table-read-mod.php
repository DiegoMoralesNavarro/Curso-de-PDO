
<?php

foreach ($result as $value) {

	$this->setModalidade($value['modalidade']);
	$this->setId($value['id']);
	$this->setModalidade($value['modalidade']);
	$this->setMensalidade($value['mensalidade']);

	$_id = $this->getId();
	$_mod = $this->getModalidade();
	$_mens = $this->getMensalidade();

?>	
		

<tr>
	<td><?php echo $_id ?></td>
	<td><?php echo $_mod ?></td>
	<td><?php echo $_mens ?></td>
	<td> <a href='edit-mod.php?id=$_id'> <i class='material-icons left'>edit</i> Editar </a> </td>
	<td> <a href='../database/modalidades/delete.php?id=$_id'> <i class='material-icons left'>delete</i> Delete </a> </td>
	<td> <a href='novo-aluno.php?id=$_id'> <i class='material-icons left'>person_add</i> Novo Aluno </a> </td>
</tr>


<?php

}

?>	