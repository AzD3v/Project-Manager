<!-- Incluir ficheiros da classe -->
<?php include "class_projeto.php"; ?>
<?php include "class_funcionario.php"; ?>

<!-- Incluir ficheiro com o cálculo do preço a pagar -->
<?php include 'calculo_preço_a_pagar.php'; ?>

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
  <title>Oficina de Apps | Área de Gestão de Projetos</title>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-light">
      <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo.png" id="logo" class="secondary-header-logo"></a>
    </nav>


      <!-- Título da Área de Gestão de Projetos -->
      <div>
        <h3 class="text-center titulo_form">Área de Gestão de Projetos</h3>
      </div>

      <!-- Área de Gestão de Projetos -->
      <div class="editar_projetos">

    <?php

    $filename = 'data/projetos.csv';

      $file = fopen($filename, 'r'); //ler o ficheiro
      while (!feof($file))

      {

        $data = fgetcsv($file, 0, ";"); //ir buscar dados ao csv

        if($data == "") {

            break;
        }

              $projeto = new Projeto($data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8]);

        $designacao = $projeto->getDescricao();
        $estado = $projeto->getEstado();
        $custos_adicionais = $data[8];
        $valor_total_a_pagar += $custos_adicionais;

        if (count($data) == 0 || $data[0] == null) {

            continue;

        }

            echo "<h3 class='titulo_projetos_gestao'>Projeto: {$designacao} <br> Estado atual: {$estado}<br>Preço total a pagar pelo projeto: {$valor_total_a_pagar}€ <br> <a href='editar_projeto.php?editar&p_id={$data[0]}'<br><br><button class='btn btn-primary botao_editar'>Editar este projeto</button></a><br><br><a href='imprimir_projetos.php?imprimir&p_id={$data[0]}'><button class='btn btn-light'>Imprimir este projeto</button></a></h3>";

      }

      ?>

          </div>

      <!-- Ligação à página de edição de projeto consoante o id -->
      <?php

          if(isset($_GET['editar'])) {

              header("Location: editar_projeto.php");

          }

      ?>
