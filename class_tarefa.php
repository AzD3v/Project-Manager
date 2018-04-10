<?php

class Tarefa{

	#Declaração de variavel estatica ou de classe

	static $tarefasID = 0;

	#Declaração dos atributos das classes

	private $id;
	private $designacao;
	private $data_inicio;
	private $duracao;
  private $funcionarios;
	private $precedentes;
  private $antecedentes;
	private $estado;


	#método construtor

	Public function __construct($designacao,$data_inicio,$duracao,$funcionarios,$precedentes, $antecedentes, $estado){

	$this->id = Tarefa::$tarefasID++;
	$this->designacao = $designacao;
	$this->duracao = $duracao;
	$this->funcionarios = $funcionarios;
	$this->precedentes = $precedentes;
  $this->antecedentes = $antecedentes;
	$this->estado = $estado;
	}

	#método destrutor

	public function __destruct(){

		return true;

	}

	#métedos seletores (getters)

	public function getID(){

		return $this->id;
	}

	public function getDesignacao(){

		return $this->designacao;
	}

	public function getDataInicio(){

		return $this->data_inicio;
	}

	public function getDuracao(){

		return $this->duracao;
	}

	public function getFuncionarios(){

		return $this->funcionarios;
	}

	public function getPrecedentes(){

		return $this->precedentes;
	}

  public function getAntecedentes() {

    return $this ->antecedentes;

  }

	# métodos modificadores setters

	public function setDesignacao($designacao){

		$this->designacao = $designacao;
	}

  public function setFuncionarios($funcionarios) {

    $this->funcionarios = $funcionarios;

  }


	public function setPrecedentes($precedentes){

		$this->precedentes = $precedentes;
	}

  public function setAntecedentes($antecedentes){

		$this->antecedentes = $antecedentes;
	}

	public function setEstado($estado){

		$this->estado = $estado;

	}

	#métedos estáticos ou de classe

	public static function getTarefasID(){

		return Tarefa::$TarefasID;

	}
}

?>
