<?php



require_once "Connection.class.php";
require_once "crudModalidade.php";

class Modalidades extends Connection implements crudModalidades{

	private $id;
	private $modalidade;
	private $mensalidade;
	public $limitLista;




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

	public function setLimitLista($limitLista){
		$this->limitLista = $limitLista;
	}

	public function getLimitLista(){
		return $this->limitLista;
	}

	///

	public function __construct(){

		$this->setLimitLista(1);

	}


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
			header("location:../../public/modalidades.php?page=1");
			echo "s";
		else:
			$_SESSION['erro'] = "Não foi possivel cadastrar";
			header("location:../../public/modalidades.php?page=1");
			echo "e";
		endif;

	}

	public function dados($sql){
		$stmt = Connection::prepare($sql); //conexão
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

	public function read(){
		$limit = $this->getLimitLista();

		if (isset($_GET['page'])) {
			$url = $_GET['page']; // pegar valor da page
			$mod = $url*$limit - $limit;

			$sql = "SELECT * FROM tb_modalidades limit $limit OFFSET $mod";
			$this->dados($sql);

		}else{
			$sql = "SELECT * FROM tb_modalidades limit $limit OFFSET 1";
			$this->dados($sql);
		}

	}

	public function paginar(){
		
		$sql_Pg = "SELECT * FROM tb_modalidades";
		$stmt_Pg = Connection::prepare($sql_Pg); //conexão
		$stmt_Pg->execute();

		$count = $stmt_Pg->rowCount();// total de registro
		
		$calculate = ceil($count/$this->getLimitLista()); //total dividido pelo limite

		$i = 1;

		$anterior = $_GET['page'] - 1;
		$seginte = $_GET['page'] + 1;

		$penultimo_fim = $calculate;
		$penultimo_inicio = ($calculate + 1) - $calculate;

		

		echo " <li class='waves-effect'><a href='?page=$anterior'><i class='material-icons'>chevron_left</i></a></li>";	

		while ($i <= $calculate ) {

			if($_GET['page'] > $limite_numeros){

			}

			if($_GET['page'] == $i){
				echo "<li class='active'><a href='?page=$i'>$i</a></li>";
			}else{
				echo "<li class='waves-effect'><a href='?page=$i'>$i</a></li>";
			}

			$i++;
		}

		echo " <li class='waves-effect'><a href='?page=$seginte'><i class='material-icons'>chevron_right</i></a></li>";
		
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