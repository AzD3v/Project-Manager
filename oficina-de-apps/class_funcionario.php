<?php

class Funcionario {

	# Declaração de variavel estatica ou de classe

	static $FuncionariosID = 1000;
	static $nFuncionarios = 0;

	# Declaração dos atributos das classes

	private $id;
	private $nome;
	private $valorDia;
	private $estado;


	# método construtor

	public function __construct($nome, $valorDia, $estado){

	$this->id = Funcionario::$FuncionariosID++;
	$this->nome = $nome;
	$this->valorDia = $valorDia;
	$this->estado = $estado;
	++Funcionario::$nFuncionarios;

	}

	# Método destrutor

	public function __destructor(){

		--Funcionario::$FuncionariosID;
		return true;

	}

	# Métodos seletores (getters)

	public function getID(){

		return $this->id;
	}

	public function getNome(){

		return $this->nome;
	}

	public function getValorDia(){

		return $this->valorDia;
	}

	public function getEstado(){

		return $this->estado;
	}


	# Métodos modificadores (setters)

	public function setNome($nome){

		$this->nome = $nome;
	}

	public function setValorDia($valor){

		$this->valorDia = $valor;
	}


	public function setEstado($estado){

		$this->estado = $estado;

	}

	# Métodos estáticos ou de classe

	public static function getFuncionariosID(){

		return Funcionario::$FuncionariosID--;

	}
}

?>
