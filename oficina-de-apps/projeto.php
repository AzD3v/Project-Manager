<?php include "projeto.class.php"; ?>

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
  <title>Oficina de Apps | Gestão de projeto</title>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-light">
      <a class="navbar-brand mx-auto" href="index.php"><img data-toggle="tooltip" title="Voltar à Homepage" src="img/logo.png" id="logo" class="secondary-header-logo"></a>

    <?php

        $filename = "projetos/projetos.csv";
        $file = fopen($filename, 'r');

        while(!feof($file)) {

            $projeto = fgetcsv($file, 0, ";");

            $projetos = new Projeto($projeto[0], $projeto[1], $projeto[2], $projeto[4] = NULL, $projeto[5] = NULL, $projeto[6] = NULL);


            }









    ?>

    <!-- Área de criação de projetos -->
    <div id="criar_projetos">

      <!-- Título do formulário -->
      <h3 class="text-center titulo_form">Gestão do projeto </h3>

      <!-- Formulário de criação de projetos -->

    <div class="form-container">
      <form action="" method="post">

        <!-- Designação do projeto -->
        <div class="form-inline">
          <label for="name">Designação do projeto:</label>
          <input type="text" name="descricao" class="form-control col-sm-3">

          <!-- Data de início do projeto -->
          <label for="date">Data de ínicio:</label>
          <input type="date" name="data" class="form-control col-sm-2">
        </div>

        <!-- Gestor responsável pelo projeto -->
        <div class="form-inline">
          <label for="gestor">Gestor responsável:</label>
          <input type="text" name="gestor" class="form-control col-sm-3">
        </div>

        <!-- Tarefas subjacentes ao projeto -->
        <div class="form-inline">
          <label for="tarefas">Tarefas associadas ao projeto:</label>

          <?php // Tarefas aqui


          ?>

        </div>

    <!-- Estado do projeto -->
    <label class="">Estado do projeto:</label>
      <select class="custom-select col-sm-2">
        <option selected value="{$projeto_por_iniciar}">Estado do projeto</option>
        <option value="{$projeto_por_iniciar}">Por iniciar</option>
        <option value="{$projeto_em_execucao}">Em execução</option>
        <option value="{$projeto_concluido}">Concluído</option>
      </select>


        <div class="form-group">
          <input type="submit" name="submeter" value="Submeter">
        </div>

      </form>

      </div>

    </div>
