<?php

class Projeto{

	#Declaração de variavel estatica ou de classe

	static $projetosID = 0;

	#Declaração dos atributos das classes

	private $id;
	private $descricao;
	private $data_inicio;
	private $gestor;
	private $descricao_tarefa;
	private $dataTarefa;
	private $funcionarios;
	private $estado;
	private $custoAdicional;

	#método construtor

	Public function __construct($descricao, $data_inicio, $gestor, $descricao_tarefa, $dataTarefa, $funcionarios, $estado, $custoAdicional){

	$this->id = Projeto::$projetosID++;
	$this->descricao = $descricao;
	$this->data_inicio = $data_inicio;
	$this->gestor = $gestor;
	$this->descricao_tarefa = $descricao_tarefa;
	$this->dataTarefa = $dataTarefa;
	$this->funcionarios = $funcionarios;
	$this->estado = $estado;
	$this->custoAdicional = $custoAdicional;

	}

	#método destrutor

	public function __destructor(){

		return true;

	}

	#métedos seletores (getters)

	public function getID(){

		return $this->id;
	}

	public function getDescricao(){

		return $this->descricao;
	}

	public function getDataInicio(){

		return $this->data_inicio;
	}

	public function getGestor(){

		return $this->gestor;
	}

	public function getDescricaoTarefa(){

		return $this->descricao_tarefa;
	}

	public function getDataTarefa() {

			return $this->dataTarefa;

	}

	public function getFuncionarios() {

			return $this->funcionarios;

	}

	public function getEstado(){

		return $this->estado;

	}

	public function getCustoAdicional() {

			return $this->custoAdicional;

	}

	# métodos modificadores setters

	public function setDescricaoTarefa($descricao){

		$this->descricao = $descricao;
	}

	public function setGestor($gestor){

		$this->gestor = $gestor;
	}

	public function setTarefa($tarefa){

		$this->tarefa = $tarefa;
	}

	public function setEstado($estado){

		$this->estado = $estado;

	}

	public function setCustoAdicional($custoAdicional) {

			$this->custoAdicional = $custoAdicional;

	}

	#métedos estáticos ou de classe

	public static function getProjetosID(){

		return Projeto::$ProjetosID;

	}
}

?>
