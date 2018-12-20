<?php



require_once "Connection.class.php";
require_once "crudModalidade.php";

class Modalidades extends Connection implements crudModalidades{

	private $id;
	private $modalidade;
	private $mensalidade;
	private $maxLinks;
	private $maxPaginas;




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

	public function setMaxLinks($maxLinks){
		$this->maxLinks = $maxLinks;
	}

	public function getMaxLinks(){
		return $this->maxLinks;
	}

	public function setMaxPaginas($maxPaginas){
		$this->maxPaginas = $maxPaginas;
	}

	public function getMaxPaginas(){
		return $this->maxPaginas;
	}

	///

	public function __construct(){

		$this->setMaxLinks(3);// maximo de numeros na paginação
		$this->setMaxPaginas(2);// maximo de item por pagina

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
			header("location:../../public/modalidades.php");
			echo "s";
		else:
			$_SESSION['erro'] = "Não foi possivel cadastrar";
			header("location:../../public/modalidades.php");
			echo "e";
		endif;

	}



	public function read(){

		
		$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
		 
		$inicio = (($this->getMaxPaginas() * $pagina) - $this->getMaxPaginas());
		
		$sql = "SELECT * FROM tb_modalidades limit $inicio , ".$this->getMaxPaginas()." ";
		$stmt = Connection::prepare($sql); //conexão
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		require_once "../forms/table-read-mod.php";

	}

	public function paginar(){

		
		$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
		$pagina_Voltar = $pagina - 1;
		$pagina_Avancar = $pagina + 1;

		$sql_pg = "SELECT * FROM tb_modalidades";
		$stmt_pg = Connection::prepare($sql_pg); //conexão
		$stmt_pg->execute();

		$total = $stmt_pg->rowCount();
		$total_Paginas = ceil($total/$this->getMaxPaginas());


		if ($total > $this->getMaxPaginas()) {
			if($pagina == 1){
				echo " <li class='disabled'><a ><i class='material-icons'>chevron_left</i></a></li>  ";
			}else{
				echo " <li class='waves-effect'><a href='?pagina=$pagina_Voltar'><i class='material-icons'>chevron_left</i></a></li>  ";
			}
			
			for($i = $pagina - $this->getMaxLinks(); $i <= $pagina - 1; $i++ ){
				if($i >= 1){
					echo "<li class='waves-effect'><a href='?pagina=$i'>$i</a></li>";
				}
			}

			echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";

			for($i = $pagina + 1; $i <= $pagina + $this->getMaxLinks(); $i++ ){
				if($i <= $total_Paginas){
					echo "<li class='waves-effect'><a href='?pagina=$i'>$i</a></li>";
				}
			}
			if($pagina == $total_Paginas){
				echo " <li class='disabled'><a><i class='material-icons'>chevron_right</i></a></li>  ";
			}else{
				echo " <li class='waves-effect'><a href='?pagina=$pagina_Avancar'><i class='material-icons'>chevron_right</i></a></li>  ";
			}	
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