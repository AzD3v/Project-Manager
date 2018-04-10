<?php include'class_funcionario.php'; ?>
<?php include'class_projeto.php'; ?>

<!DOCTYPE html!>
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
  <title>Oficina de Apps | Área de edição de projeto</title>
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

        if(isset($_GET['editar'])) {

          $p_id = $_GET['p_id'];

        if($data[0] == $p_id) {

        $projeto = new Projeto($data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8]);

        $designacao = $projeto->getDescricao();
        $data_inicio = $projeto->getDataInicio();
        $gestor = $projeto->getGestor();
        $primeira_tarefa = $projeto->getDescricaoTarefa();
        $data_primeira_tarefa = $projeto->getDataTarefa();
        $funcionarios = $projeto->getFuncionarios();
        $custos_adicionais = $projeto->getCustoAdicional();
        $estado = $projeto->getEstado();

        if (count($data) == 0 || $data[0] == null) {

            continue;

        }

      }

    }

  }

    ?>

    <!-- Área de criação de data -->
    <div id="criar_data">

      <!-- Título do formulário -->
      <h3 class="text-center titulo_form">Área de Edição de Projeto</h3>

    <!-- Formulário de criação de data -->
    <div class="form-container">
      <form action="" method="post">

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
        <div class="form-inline">
          <label for="descricao_tarefa">Primeira tarefa associada ao projeto:</label>
          <input type="text" name="descricao_primeira_tarefa" id="tarefa" value="<?php echo $primeira_tarefa; ?>" class="form-control col-sm-4">
        </div>


        <!-- Adicionar mais tarefas ao projeto -->
        <div class="form-inline">
          <label for="tarefa">Adicionar tarefas ao projeto:</label>
          <input type="number" name="tarefa" id="tarefa" class="form-control col-sm-2">
          <button type="button" class="btn btn-primary" id="adicionar_tarefa" onclick="addFieldsTarefas()">Adicionar Tarefas</button>
          <div id="container_tarefas" class="container_add"/></div>
        </div>

        <!-- Funcionários associados à tarefa -->
        <div class="form-inline">
        <label for="funcionario">Funcionários associados à tarefa:</label>
          <input type="number" name="funcionario" id="funcionario" class="form-control col-sm-2">
          <button type="button" class="btn btn-primary" id="adicionar_funcionario" onclick="addFieldsFuncionarios()">Adicionar funcionários à tarefa</button>
          <div id="container_funcionarios" class="container_add"/></div>
        </div>

        <!-- Estado do projeto -->
        <div class="form-inline">
          <label for="estado">Estado atual do projeto:</label>
          <select name="estado" class="custom-select col-sm-2">
            <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
            <option value="Por iniciar">Por iniciar</option>
            <option value="Em execução">Em execução</option>
            <option value="Concluído">Concluído</option>
          </select>
        </div>

        <!-- Custos adicionais do projeto -->
        <div class="form-inline">
        <label for="data_tarefa">Custos adicionais do projeto:</label>
          <input type="number" name="custos_adicionais" value="<?php echo $custos_adicionais; ?>" class="form-control col-sm-1">
        </div>


          <!-- Botão de submissão -->
          <div class="form-group">
            <button type="submit" name="formulario_projetos" class="btn btn-success botao_submeter">Atualizar Projeto</button>
          </div>

      </form>

      </div>

    </div>

<!-- JavaScript -->
<script type='text/javascript'>
        function addFieldsFuncionarios(){
            // Números de caixas de texto a serem criadas
            var number = document.getElementById("funcionario").value;
            // Container que receberá as novas caixas de texto
            var container_funcionarios = document.getElementById("container_funcionarios");
            // Eliminar antigo conteúdo do container_funcionarios
            while (container_funcionarios.hasChildNodes()) {
                container_funcionarios.removeChild(container_funcionarios.lastChild);
            }
            for (i=0; i<number; i++){
                // Criar "node" de texto
                container_funcionarios.appendChild(document.createTextNode("Funcionário " + (i+1) + ":"));
                // Criar a caixa de texto com os seus atributos
                var input = document.createElement("input");
                input.type = "text";
                input.name = "funcionario" + i;
                container_funcionarios.appendChild(input);
                // Adicionar um "line break"
                container_funcionarios.appendChild(document.createElement("br"));
            }
        }

        function addFieldsTarefas(){
            // Números de caixas de texto a serem criadas
            var number = document.getElementById("tarefa").value;
            // Container que receberá as novas caixas de texto
            var container_tarefas = document.getElementById("container_tarefas");
            // Eliminar antigo conteúdo do container_tarefas
            while (container_tarefas.hasChildNodes()) {
                container_tarefas.removeChild(container_tarefas.lastChild);
            }
            for (i=0; i<number; i++){
                // Criar "node" de texto
                container_tarefas.appendChild(document.createTextNode("Tarefas" + (i+1) + ":"));
                // Criar a caixa de texto com os seus atributos
                var input = document.createElement("input");
                input.type = "text";
                input.name = "tarefa" + i;
                container_tarefas.appendChild(input);
                // Adicionar um "line break"
                container_tarefas.appendChild(document.createElement("br"));
            }
        }





    </script>
