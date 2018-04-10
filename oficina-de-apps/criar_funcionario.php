<!-- Incluir o ficheiro da classe -->
<?php include'class_funcionario.php';?>
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
  <title>Oficina de Apps | Adicionar Funcionário</title>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-light">
      <a href="index.php" data-toggle="tooltip" title="Voltar à Homepage"><img data-toggle="tooltip" title="Voltar à Homepage" src="img/home.png" alt="Homepage" id="homepage-icon"></a>
      <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo.png" id="logo" class="secondary-header-logo-2"></a>
    </nav>

    <?php

        if(!file_exists("data/funcionarios.csv")) {

            $file = fopen("data/funcionarios.csv", "w");
            fclose($file);

            }


        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $file=fopen("data/funcionarios.csv", "r");

            while (!feof($file)) {

              $data=fgetcsv($file, 0, ";");

			  if($data[0]==""){

			  break;

			  }

              $funcionario = new Funcionario($data[1], $data[2], $data[3]);


            }

            fclose($file);

            $funcionario = new Funcionario($_POST['nome'], $_POST['valor'], $_POST['estado']);

            $funcionario = (array)$funcionario;

            $file = fopen("data/funcionarios.csv", "a");

            fputcsv($file, $funcionario, ";");

            fclose($file);

                  echo "<strong><p class='text-center alert alert-primary'>Funcionário criado com sucesso!</p></strong>";

        }

    ?>

    <!-- Área de criação de Funcionários -->
    <div id="criar_data">

      <!-- Título do formulário -->
      <h3 class="text-center titulo_form">Adicionar funcionários</h3>

      <!-- Formulário de criação de Funcionários -->

    <div class="form-container">
      <form action="" method="post">

        <!-- Designação do projeto -->
        <div class="form-inline">
          <label for="name">Nome do funcionário:</label>
          <input type="text" name="nome" class="form-control col-sm-2">

          <!-- Valor dia do funcionário -->
          <label for="value">Valor auferido diariamente:</label>
          <input type="number" name="valor" class="form-control col-sm-1">
        </div>


    <!-- Estado do Funcionario-->
    <label class="">Estado atual do Funcionário:</label>
      <select name ="estado" class="custom-select col-sm-2">
        <option selected value="disponivel">Estado do funcionário</option>
        <option value="disponivel">Disponível</option>
        <option value="indisponivel">Indisponível</option>
      </select>

        <div class="form-group">
          <button type="submit" name="formulario_funcionarios" class="btn btn-success botao_editar_funcionario">Submeter</button>
        </div>

      </form>

      </div>

    </div>
