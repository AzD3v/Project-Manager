<?php

    # Receber os campos do formulário
    $nome_projeto = utf8_decode($_POST['designacao']);
    $data_projeto = utf8_decode($_POST['data']);
    $gestor_projeto = utf8_decode($_POST['gestor']);
    $tarefas_projeto = utf8_decode($_POST['tarefas']);
    $data_inicio_tarefa = utf8_decode($_POST['data_inicio_tarefa']);
    $funcionarios_projeto = utf8_decode($_POST['funcionarios']);
    $estado_projeto = utf8_decode($_POST['estado']);
    $custos_adicionais = utf8_decode($_POST['custos_adicionais']);
    $preco_projeto = utf8_decode($_POST['preco']);

    require('fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);

    # Nome do projeto
    $pdf->Cell(0, 10, "Projeto: {$nome_projeto}", 1, 1, 'C');

    # Data de início do projeto
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Data de início do projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $data_projeto, 0, 1);

    # Gestor responsável pelo projeto
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Gestor responsável pelo projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $gestor_projeto, 0, 1);

    # Tarefas associadas ao projeto
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Tarefas associadas ao projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $tarefas_projeto, 0, 1);

    # Data das tarefas
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Data das tarefas associadas ao projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $data_inicio_tarefa, 0, 1);

    # Funcionário que trabalham no projeto
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Número de funcionários que trabalham no projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $funcionarios_projeto, 0, 1);

    # Estado do projeto
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Estado do projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $estado_projeto, 0, 1);

    # Custos adicionais
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Custos adicionais inerentes ao projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $custos_adicionais . ' euros', 0, 1);

    # Custo total do projeto
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50, 10, utf8_decode("Custo total do projeto: "), 0, 1);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(50, 10, $preco_projeto . ' euros', 0, 1);

    $pdf->Output();

?>

</body>
</html>
