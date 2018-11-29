<?php

interface CrudAlunos{
	//para segurança da informação

	public function create();
	public function read($search);
	public function update($nome, $tel, $email, $modalidade, $id);
	public function delete($id);
}


?>