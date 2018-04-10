<?php

class Projeto{
	
	#Declaração de variavel estatica ou de classe
	
	static $projetosID = 0;
	
	#Declaração dos atributos das classes
	
	private $id;
	private $descricao;
	private $data_inicio;
	private $gestor;
	private $tarefas;
	private $estado;
		
	
	#método construtor
	
	private function __construct($id,$descricao,$data_inicio,$gestor,$tarefas,$estado){
	
	$this->id = ++Projeto::$projetosID;
	$this->descricao = $descricao;
	$this->data_inicio = $data_inicio;
	$this->gestor = $gestor;
	$this->tarefas = $tarefas;
	$this->estado = $estado;
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
	
	public function getData_inicio(){
		
		return $this->data_inicio;
	}
	
	public function getGestor(){
		
		return $this->gestor;
	}
	
	public function getTarefas(){
		
		return $this->tarefas;
	}
	
	public function getEstado(){
		
		return $this->estado;
	}
	
	# métodos modificadores setters
	
	public function setDescricao($descricao){
		
		$this->descricao = $descricao;
	}
	
	public function setGestor($gestor){
		
		$this->gestor = $gestor;
	}
	
	public function setData_inicio($data){
	
		$this->data_inicio = $data;
	}
	
	
	public function setTarefa($tarefa){
	
		$this->tarefa = $tarefa;
	}
	
	public function setEstado($estado){
	
		$this->estado = $estado;
		
	}
	
	#métedos estáticos ou de classe

	public static function getProjetosID(){
	
		return Projeto::$ProjetosID;
		
	}
}
	
?>
