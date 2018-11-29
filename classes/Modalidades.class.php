<?php



require_once "Connection.class.php";
require_once "crudModalidade.php";

class Modalidades extends Connection implements crudModalidades{

	private $id;
	private $modalidade;
	private $mensalidade;




	///
	protected function setId($id){
		$this->id = $id;
	}

	protected function getId(){
		return $this->id;
	}

	protected function setModalidade($modalidade){
		$this->modalidade = $modalidade;
	}

	protected function getModalidade(){
		return $this->modalidade;
	}

	protected function setMensalidade($mensalidade){
		$this->mensalidade = $mensalidade;
	}

	protected function getMensalidade(){
		return $this->mensalidade;
	}

	///


	// METODOS ESPECIFICOS

	public function dadosDoFormulario($modalidade, $mensalidade){
		$this->setModalidade($modalidade);
		$this->setMensalidade($mensalidade);
	}

	public function dadosDaTabela($id){
		$this->setId($id);
		$_id = $this->getId();

		$sql = "SELECT * FROM tb_modalidades WHERE id = :id";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':id', $_id);
		$stmt->execute();
		$resultado = $stmt->fetchAll();

		foreach ($resultado as $value) {
			require_once "../forms/form-edit-mod.php";
		}
	}


	// metodos da interface

	public function create(){

		$sql = "INSERT INTO tb_modalidades (modalidade, mensalidade) VALUES (:mod, :mens)";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':mod', $this->getModalidade());
		$stmt->bindParam(':mens', $this->getMensalidade());

		session_start();

		if($stmt->execute()):
			$_SESSION['sucesso'] = "Cadastrado com sucesso.";
			header("location:../../public/modalidades.php");
			echo "s";
		else:
			$_SESSION['erro'] = "Não foi possivel cadastrar";
			header("location:../../public/modalidades.php");
			echo "e";
		endif;

	}

	public function read(){
		$sql = "SELECT * FROM tb_modalidades";
		$stmt = Connection::prepare($sql); //conexão
		$stmt->execute();

		$result = $stmt->fetchAll();

		foreach ($result as $value) {
			$this->setId($value['id']);
			$this->setModalidade($value['modalidade']);
			$this->setMensalidade($value['mensalidade']);

			$_id = $this->getId();
			$_mod = $this->getModalidade();
			$_mens = $this->getMensalidade();

			echo "<tr>";
			echo "<td>$_id</td>";
			echo "<td>$_mod</td>";
			echo "<td>$_mens</td>";
			echo "<td> <a href='edit-mod.php?id=$_id'> <i class='material-icons left'>edit</i> Editar </a> </td>";
			echo "<td> <a href='../database/modalidades/delete.php?id=$_id'> <i class='material-icons left'>delete</i> Delete </a> </td>";
			echo "<td> <a href='novo-aluno.php?id=$_id'> <i class='material-icons left'>person_add</i> Novo Aluno </a> </td>";
			echo "</tr>";
		}
	}

	public function update($modalidade, $mensalidade, $id){

		$this->setModalidade($modalidade);
		$this->setMensalidade($mensalidade);
		$this->setId($id);

		$mod = $this->getModalidade();
		$mens = $this->getMensalidade();
		$id = $this->getId();

		$sql = "UPDATE tb_modalidades set modalidade = :mod, mensalidade = :mens WHERE id = :id";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':mod', $mod);
		$stmt->bindParam(':mens', $mens);
		$stmt->bindParam(':id', $id);

		$stmt->execute();
		$destino = header('location: ../../public/modalidades.php');
	}

	public function delete($id){

		$this->setId($id);
		$id = $this->getId();

		$sql = "DELETE FROM tb_modalidades WHERE id = :id";
		$stmt = Connection::prepare($sql); //conexão

		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$destino = header('location: ../../public/modalidades.php');

	}



}



?>