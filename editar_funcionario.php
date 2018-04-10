<!-- Incluir ficheiro da classe -->
<?php include'class_funcionario.php'; ?>

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
  <title>Oficina de Apps | Área de edição de Funcionario</title>

</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-light">
      <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo.png" id="logo" class="secondary-header-logo"></a>
    </nav>

    <?php

    $filename = 'data/funcionarios.csv';

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

        $funcionario = new Funcionario($data[1], $data[2], $data[3]);

		  $id = $funcionario->getID();
		  $nome = $funcionario->getNome();
		  $valor_dia = $funcionario->getValorDia();
		  $estado = $funcionario->getEstado();


		 }

      }

    }

    ?>

	<?php

	 if($_SERVER["REQUEST_METHOD"] == "POST") {

		$file = fopen("data/funcionarios.csv", "w");

		while (!feof($file)) {

		$new_nome = $funcionario->setNome($_POST["nome"]);
		$new_valor_dia = $funcionario->setValorDia($_POST["valor"]);
		$new_estado = $funcionario->setEstado($_POST["estado"]);


		$funcionario = new Funcionario($new_nome,$new_valor_dia,$new_estado);

        $funcionario = (array)$funcionario;

        fputcsv($file, $funcionario, ";");

	 }

	 fclose($file);

	 }

    ?>

    <!-- Área de criação de Funcionários -->
    <div id="criar_data">

      <!-- Título do formulário -->
      <h3 class="text-center titulo_form">Editar funcionários</h3>

      <!-- Formulário de criação de Funcionários -->

    <div class="form-container">
      <form action="" method="post">

        <!-- Designação do projeto -->
        <div class="form-inline">
          <label for="name">Nome do functionário:</label>
          <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control col-sm-2">

          <!-- Valor dia do funcionário -->
          <label for="value">Valor auferido diariamente:</label>
          <input type="number" name="valor"  value="<?php echo $valor_dia; ?>" class="form-control col-sm-1">
        </div>


    <!-- Estado do Funcionario-->
    <label class="">Estado atual do Funcionário:</label>
      <select name ="estado" value= class="custom-select col-sm-2">
        <option selected value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
        <option value="Disponivel">Disponível</option>
        <option value="Indisponivel">Indisponível</option>
      </select>

        <div class="form-group">
          <button type="submit" name="formulario_functionarios" class="btn btn-success botao_editar_funcionario">Submeter</button>
        </div>

      </form>

      </div>

    </div>

</body>
</html>
