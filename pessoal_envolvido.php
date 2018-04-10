<!-- Incluir ficheiro da classe -->
<?php include "class_funcionario.php"; ?>

<!DOCTYPE html>
<html lang="pt">
<head>

  <!-- Metatags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Folhas de estilo -->
  <link rel="stylesheet" href="css/styles.css">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!-- Título da página -->
  <title>Oficina de Apps | Área de Gestão de Funcionários</title>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-light">
      <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo.png" id="logo" class="secondary-header-logo"></a>
    </nav>


      <!-- Título da Área de Gestão de Funcionários -->
      <div>
        <h3 class="text-center titulo_form">Área de Gestão de Funcionários</h3>
      <div>

      <!-- Área de Gestão de Funcionários -->
      <div class="editar_projetos">

    <?php

    $filename = 'data/funcionarios.csv';

      $file = fopen($filename, 'r'); //ler o ficheiro
      while (!feof($file))

      {

        $data = fgetcsv($file, 0, ";"); //ir buscar dados ao csv

		if($data[0]==""){

				break;

		}

              $funcionario = new Funcionario($data[1], $data[2], $data[3]);

			  $id = $funcionario->getID();
			  $nome = $funcionario->getNome();
			  $valor_dia = $funcionario->getValorDia();
			  $estado = $funcionario->getEstado();



             echo "<h3 class='titulo_projetos_gestao'>ID Funcionario: {$id} <br> Nome: {$nome}<br> Valor dia: {$valor_dia} <br> Estado:{$estado}<br><a href='editar_funcionario.php?editar&p_id={$data[0]}'<button class='btn btn-primary botao_editar'>Editar</button></a><a href='pessoal_envolvido.php?eliminar_funcionario&id={$id}'><button class='btn btn-danger'>Eliminar Funcionário</button></a></h3>";

			 }

      ?>

          </div>

          <!-- Criar novo funcionario-->

      		<a href="criar_funcionario.php"><button class='btn btn-success botao_criar_funcionario'>Criar novo Funcionário</button></a>

          <!-- Eliminar funcionário -->
          <?php

          $filename = 'data/funcionarios.csv';

            $file = fopen($filename, 'r'); //ler o ficheiro
            while (!feof($file))

            {

              $data = fgetcsv($file, 0, ";"); //ir buscar dados ao csv

                  if($data[0] == $id && isset($_GET['eliminar_funcionario']))  {

                      unset($funcionario);

                  }

            }

          ?>
