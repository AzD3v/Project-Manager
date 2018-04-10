<!-- Incluir os ficheiros da classe -->
<?php include'class_funcionario.php'; ?>
<?php include'class_projeto.php'; ?>

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
  <title>Oficina de Apps | Área de impressão de projeto</title>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-light">
      <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo.png" id="logo" class="secondary-header-logo"></a>
    </nav>

    <?php
    $filename = 'data/projetos.csv';

      $file = fopen($filename, 'r'); //ler o ficheiro csv
      while (!feof($file))

      {

        $data = fgetcsv($file, 0, ";"); //ir buscar dados ao ficheiro csv

        if($data == "") {

            break;

        }

        if(isset($_GET['imprimir'])) {

          $p_id = $_GET['p_id'];

        if($data[0] == $p_id) {

        $projeto = new Projeto($data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8]);

        $designacao = $projeto->getDescricao();
        $data_inicio = $projeto->getDataInicio();
        $tarefa_inicial = $projeto->getDescricaoTarefa();
        $funcionarios_tarefa = $projeto->getFuncionarios();
        $data_inicio_tarefa = $projeto->getDataTarefa();
        $estado = $projeto->getEstado();
        $custos_adicionais = $projeto->getCustoAdicional();
        $gestor = $projeto->getGestor();
        $custos_adicionais = $data[8];
        $valor_total_a_pagar += $custos_adicionais;

        if($data[0] == "") {

            break;

        }

      }

    }

  }

    ?>

    <!-- Área de criação de data -->
    <div id="criar_data">

      <!-- Título do formulário -->
      <h3 class="text-center titulo_form">Área de Impressão de Projeto</h3>

    <!-- Formulário de criação de data -->
    <div class="form-container">
      <form action="pdfs_projetos.php" method="post">

         <!-- Designação do projeto -->
        <div class="form-inline">
          <label for="name">Designação do projeto:</label>
          <input type="text" name="designacao" value="<?php echo $designacao; ?>" class="form-control col-sm-3">

          <!-- Data de início do projeto -->
          <label for="data">Data de ínicio:</label>
          <input type="text" name="data" value="<?php echo $data_inicio; ?>" class="form-control col-sm-2">
        </div>

		<!-- Gestor responsável pelo projeto -->
		<label for="gestor">Gestor responsável pelo projeto:</label>

		<select name="gestor" class="custom-select col-sm-2">

      <option value="<?php echo $gestor; ?>"><?php echo $gestor;?></option>

		<?php

		$filename = 'data/funcionarios.csv';

			$file = fopen($filename, 'r'); //ler o ficheiro
			while (!feof($file))

			{

			  $data = fgetcsv($file, 0, ";"); //ir buscar dados ao csv

        if($data[0] == "") {

            break;

        }

        $funcionario = new Funcionario($data[1], $data[2], $data[3]);

			  $nome = $funcionario->getNome();

			  echo "<option value='$nome'>$nome</option>";

			}

		?>

		</select>

        <!-- Tarefas subjacentes ao projeto -->
        <!-- Nome da primeira tarefa -->
        <div class="form-inline">
          <label for="descricao_tarefa">Tarefas associadas ao projeto:</label>
          <input type="text" name="tarefas" value="<?php echo $tarefa_inicial; ?>" class="form-control col-sm-4">
        </div>

        <!-- Data de início da primeira tarefa -->
        <div class="form-inline">
          <label for="data_inicio_tarefa">Data de início da tarefa:</label>
          <input type="text" name="data_inicio_tarefa" value="<?php echo $data_inicio_tarefa; ?>" class="form-control col-sm-4">
        </div>

        <!-- Funcionários associados à tarefa -->
        <div class="form-inline">
        <label for="data_tarefa">Número de funcionários associados à tarefa:</label>
        <input type="text" name="funcionarios" value="<?php echo $funcionarios_tarefa; ?>" class="form-control col-sm-1">
        </div>

        <!-- Estado do projeto -->
        <div class="form-inline">
          <label for="estado">Estado atual do projeto:</label>
          <select name="estado" class="custom-select col-sm-2">
            <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
          </select>
        </div>

        <!-- Custos adicionais do projeto -->
        <div class="form-inline">
        <label for="data_tarefa">Custos adicionais do projeto:</label>
          <input type="number" name="custos_adicionais" value="<?php echo $custos_adicionais; ?>" class="form-control col-sm-1">
        </div>

        <!-- Preço total a pagar pelo projeto -->
        <div class="form-inline">
          <label for="preço total">Preço total a pagar pelo projeto: <?php echo $valor_total_a_pagar; ?>€</label>
          <input type="hidden" name="preco" value="<?php echo $valor_total_a_pagar; ?>">
        </div>

          <!-- Botão de submissão -->
          <div class="form-group">
            <button type="submit" name="imprimir_projeto" class="btn btn-success botao_submeter">Imprimir Projeto</button>
          </div>

      </form>
      </div>
    </div>
