<?php

require_once "Connection.class.php";
require_once "crudAlunos.php";


class Alunos extends Connection implements CrudAlunos{

	private $id;
	private $nome;
	private $tel;
	private $email;
	private $modalidade;


	//
	protected function getId(){
		return $this->id;
	}

	protected function setId($id){
		$this->id = $id;
	}

	protected function getNome(){
		return $this->nome;
	}

	protected function setNome($nome){
		$this->nome = $nome;
	}

	protected function getTel(){
		return $this->tel;
	}

	protected function setTel($tel){
		$this->tel = $tel;
	}

	protected function getEmail(){
		return $this->email;
	}

	protected function setEmail($email){
		$this->email = $email;
	}

	protected function getModalidade(){
		return $this->modalidade;
	}

	protected function setModalidade($modalidade){
		$this->modalidade = $modalidade;
	}


	//

	public function dadosDoFormulario($nome, $tel, $email, $modalidade){
		$this->setNome($nome);
		$this->setTel($tel);
		$this->setEmail($email);
		$this->setModalidade($modalidade);
	}

	public function dadosDaTabela($id){
		$this->setId($id);
		$id = $this->getId();

		$sql = "SELECT * FROM tb_alunos WHERE id = :id";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$result = $stmt->fetchAll();

		foreach ($result as $value) {
			require_once "../forms/form-edit-aluno.php";
		}
	}

	//

	public function create(){

		$nome = $this->getNome();
		$tel = $this->getTel();
		$email = $this->getEmail();
		$modalidade = $this->getModalidade();

		$sql = "INSERT INTO tb_alunos (nome, tel, email, modalidade) VALUES (:nome, :tel, :email, :modalidade)";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':tel', $tel);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':modalidade', $modalidade);

		print_r($modalidade);

		session_start();

		if($stmt->execute()):
			$_SESSION['sucesso'] = "Cadastrado com sucesso.";
			header("location:../../public/modalidades.php");
		else:
			$_SESSION['erro'] = "Não foi possivel cadastrar";
			header("location:../../public/modalidades.php");
		endif;



	}

	public function read($search){

		$search = $search . "%";

		$sql = "SELECT tb_alunos.id, tb_alunos.nome, tb_alunos.tel, tb_alunos.email, tb_modalidades.modalidade, tb_modalidades.mensalidade FROM tb_alunos JOIN tb_modalidades on tb_modalidades.id = tb_alunos.modalidade WHERE tb_modalidades.modalidade like :search";

		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':search', $search);
		$stmt->execute();

		$result = $stmt->fetchAll();

		foreach ($result as $value) {
			$this->setId($value['id']);

			echo "<tr>";
			echo "<td>" . $value['nome'] . "</td>";
			echo "<td>" . $value['tel'] . "</td>";
			echo "<td>" . $value['email'] . "</td>";
			echo "<td>" . $value['modalidade'] . "</td>";
			echo "<td>" . $value['mensalidade'] . "</td>";
			echo "<td> <a href='edit-alunos.php?id={$this->getId()}' class='btn btn-small'>Editar</a> </td>";
			echo "<td> <a href='../database/alunos/delete.php?id={$this->getId()}' class='btn btn-small red'>Delete</a> </td>";
			echo "</tr>";
		}

	}

	public function update($nome, $tel, $email, $modalidade, $id){
		$this->setNome($nome);
		$this->setTel($tel);
		$this->setEmail($email);
		$this->setModalidade($modalidade);
		$this->setId($id);

		$nome = $this->getNome();
		$tel = $this->getTel();
		$email = $this->getEmail();
		$modalidade = $this->getModalidade();
		$id = $this->getId();

		$sql = "UPDATE tb_alunos set nome = :nome, tel = :tel, email = :email, modalidade = :modalidade WHERE id = :id";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':tel', $tel);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':modalidade', $modalidade);
		$stmt->bindParam(':id', $id);
		var_dump($nome);
		$stmt->execute();
		$destino = header("location:../../public/home.php");

	}

	public function delete($id){

		$this->setId($id);
		$id = $this->getId();

		$sql = "DELETE FROM tb_alunos WHERE id = :id";
		$stmt = Connection::prepare($sql);

		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$destino = header('location:../../public/home.php');

	}




}

?>