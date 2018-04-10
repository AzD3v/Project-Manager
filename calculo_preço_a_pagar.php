<?php

# Cálculo do salário dos funcionários
$filename = 'data/funcionarios.csv';

$file = fopen($filename, 'r'); //ler o ficheiro
while (!feof($file))

{

  $data = fgetcsv($file, 0, ";"); //ir buscar dados ao csv

  if($data[0] == "") {

    break;

  }

  # Salário do gestor
  $salario_gestor = 150;

  # Cálculo do salário a pagar aos funcionários das tarefas
  $funcionario = new Funcionario($data[1], $data[2], $data[3]);
  $salario_funcionarios_tarefas = $funcionario->getValorDia();

  # Valor total a pagar
  $valor_total_a_pagar = $salario_funcionarios_tarefas + $salario_gestor;
  $valor_total_a_pagar;

}


?>
