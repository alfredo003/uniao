<?php

include('../fpdf/fpdf.php');
include_once '../Conexao.php';
include_once '../sessoes.php';
header('charset=utf-8');
$pdo = ConexaoBD::connexao();
$pessoa = $_GET['pessoa'];
$func = $_GET['func'];
$Pegar_ESCOLA = $pdo->prepare("SELECT * FROM `escola` WHERE 1");
$Pegar_ESCOLA->execute();

$titulo = $Pegar_ESCOLA->fetch(PDO::FETCH_ASSOC);


$pessoa = $_GET['pessoa'];
$idFuncionario = $_GET['func'];
$Pegar_pessoa = $pdo->prepare("SELECT * FROM pessoa WHERE idpessoa='$pessoa'");
$Pegar_pessoa->execute();
$Linhapessoa = $Pegar_pessoa->fetch(PDO::FETCH_ASSOC);


$Horario_S = $pdo->prepare("SELECT COUNT(*) FROM Horario WHERE idFuncionario='$idFuncionario' AND Dia_Semana='Segunda'");
$Horario_S->execute();
$H_Segunda = $Horario_S->fetch(PDO::FETCH_ASSOC);
$Segunda = $H_Segunda['COUNT(*)'];

$Horario_T = $pdo->prepare("SELECT COUNT(*) FROM Horario WHERE idFuncionario='$idFuncionario' AND Dia_Semana='Terca'");
$Horario_T->execute();
$H_Terca = $Horario_T->fetch(PDO::FETCH_ASSOC);
$Terca = $H_Terca['COUNT(*)'];


$Horario_Q = $pdo->prepare("SELECT COUNT(*) FROM Horario WHERE idFuncionario='$idFuncionario' AND Dia_Semana='Quarta'");
$Horario_Q->execute();
$H_Quarta = $Horario_Q->fetch(PDO::FETCH_ASSOC);
$Quarta = $H_Quarta['COUNT(*)'];


$Horario_qi = $pdo->prepare("SELECT COUNT(*) FROM Horario WHERE idFuncionario='$idFuncionario' AND Dia_Semana='Quinta'");
$Horario_qi->execute();
$H_Quinta = $Horario_qi->fetch(PDO::FETCH_ASSOC);
$Quinta = $H_Quinta['COUNT(*)'];

$Horario_Sx = $pdo->prepare("SELECT COUNT(*) FROM Horario WHERE idFuncionario='$idFuncionario' AND Dia_Semana='Sexta'");
$Horario_Sx->execute();
$H_Sexta = $Horario_Sx->fetch(PDO::FETCH_ASSOC);
$Sexta = $H_Sexta['COUNT(*)'];

$N_faltas_S = $pdo->prepare("SELECT sum(n_tempo) FROM falta_lectiva WHERE Id_pessoa = '$pessoa' AND dia_semana='Segunda'");
$N_faltas_S->execute();
$totalSoma_S = $N_faltas_S->fetchColumn();
$falta_S = floor($totalSoma_S / ($Segunda == 0 ? 1 : $Segunda ));



$N_faltas_T = $pdo->prepare("SELECT sum(n_tempo) FROM falta_lectiva WHERE Id_pessoa = '$pessoa' AND dia_semana='Terca'");
$N_faltas_T->execute();
$totalSoma_T = $N_faltas_T->fetchColumn();

$falta_T = floor($totalSoma_T / ($Terca == 0 ? 1 : $Terca ));

$N_faltas_Q = $pdo->prepare("SELECT sum(n_tempo) FROM falta_lectiva WHERE Id_pessoa = '$pessoa' AND dia_semana='Quarta'");
$N_faltas_Q->execute();
$totalSoma_Q = $N_faltas_Q->fetchColumn();
$falta_Q = floor($totalSoma_Q / ($Quarta == 0 ? 1 : $Quarta ));

$N_faltas_Qi = $pdo->prepare("SELECT sum(n_tempo) FROM falta_lectiva WHERE Id_pessoa = '$pessoa' AND dia_semana='Quinta'");
$N_faltas_Qi->execute();
$totalSoma_Qi = $N_faltas_Qi->fetchColumn();
$falta_Qi = floor($totalSoma_Qi / ($Quinta == 0 ? 1 : $Quinta ));

$N_faltas_Sexta = $pdo->prepare("SELECT sum(n_tempo) FROM falta_lectiva WHERE Id_pessoa = '$pessoa' AND dia_semana='Sexta'");
$N_faltas_Sexta->execute();
$totalSoma_Sexta = $N_faltas_Sexta->fetchColumn();
$falta_Sexta = floor($totalSoma_Sexta / ($Sexta == 0 ? 1 : $Sexta ));

$Totalfaltas_LECTIVAS = ($falta_S + $falta_T + $falta_Q + $falta_Qi + $falta_Sexta);

$N_faltas_=$pdo->prepare("SELECT sum(n_tempo) FROM faltas_pedagogicas WHERE Id_pessoa = '$pessoa'");
                    $N_faltas_->execute();
                    $totalSoma_= $N_faltas_S->fetchColumn();
                    $falta_=floor($totalSoma_S);
                    
                    $Totalfaltas= ($falta_S);
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->Image('../images/ARiisidr.jpg', '95', '4', '18', 'jpg');
$pdf->SetFont('Times', '', '10');
$pdf->Ln(5);

//$pdf->Image('img/Globosoft.jpg',150,'25','45','18','JPG');

$pdf->Cell('188', '7', utf8_decode($titulo['educacao']), '', '', 'C');
$pdf->SetFont('Times', 'B', '10');
$pdf->Ln(2);

$pdf->Cell('188', '15', utf8_decode($titulo['nome']), '', '', 'C');
$pdf->Ln(10);
$pdf->Cell('188', '8', utf8_decode($titulo['outro']), '', '', 'C');
$pdf->Ln(10);
// largura padr├гo das colunas
$pdf->Cell('45', '8', 'Faltas refente ao Professor:', '', '', 'L');

$pdf->SetFont('Times', 'B', '14');
$pdf->Cell('80', '8', utf8_decode($Linhapessoa['nome']), '', '', 'L');
$pdf->SetFont('Times', '', '10');
$pdf->Ln(8);
$pdf->SetFont('Times', '', '12');
$pdf->Cell('190', '6', utf8_decode('Faltas Lectivas:                        ') . $Totalfaltas_LECTIVAS, 0, 0, 'L');
$pdf->Ln(8);
$pdf->Cell('190', '6', utf8_decode('Faltas Administrativas:                        ') . $Totalfaltas_LECTIVAS, 0, 0, 'L');
$pdf->Ln(8);
$pdf->Cell('190', '6', utf8_decode('Faltas Pedagogicas:                        ') . $Totalfaltas, 0, 0, 'L');
$pdf->Ln(12);
$medi=$Totalfaltas_LECTIVAS+$Totalfaltas;
$pdf->Cell('45', '8', ('TOTAL DE FALTAS:ллллллллллл ').$medi, '', '', 'L');
$pdf->Ln(60);

// montando a tabela com os dados (presumindo que a consulta j├б foi feita)
/*
  while( $row = mysql_fetch_assoc($rs) )
  {
  $pdf->Cell($largura, $altura, $row['codusuario'], 1, 0, 'L');
  $pdf->Cell($largura, $altura, $row['nome'], 1, 0, 'L');
  $pdf->Cell($largura, $altura, $row['email'], 1, 0, 'L');
  $pdf->Cell($largura, $altura, $row['telefne'], 1, 0, 'L');
  $pdf->Cell($largura, $altura, $row['ativo'], 1, 0, 'C');
  $pdf->Ln($altura);
  } */

// exibindo o PDF
$pdf->Output();
?>