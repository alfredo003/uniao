<?php

include('../fpdf/fpdf.php');

header('charset=utf-8');




// muda fonte e coloca em negrito
$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();
$pdf->SetMargins( 5, 5, 5, 0 );
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->Image('../images/ARiisidr.jpg', '95', '4', '18', 'jpg');
$pdf->SetFont('Times', '', '10');
$pdf->Ln(5);

//$pdf->Image('img/Globosoft.jpg',150,'25','45','18','JPG');

$pdf->Cell('188', '7',utf8_decode("-----------------------------"), '', '', 'C');
$pdf->SetFont('Times', 'B', '10');
$pdf->Ln(2);

$pdf->Ln(10);
$largura = 30;
// altura padrão das linhas das colunas

$altura = 6;



# code...Colunas 
$pdf->SetFillColor(160, 160, 160);

$pdf->Cell(150, 100, '', 1, 0, 'L', TRUE);


// criando os cabeçalhos para 5 colunas
// pulando a linha
// tirando o negrito
$pdf->Ln($altura);
$pdf->SetFont('Arial', '', 7);


    
   



$pdf->Output();
