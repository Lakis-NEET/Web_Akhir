<?php
ob_start();
require(__DIR__ . '\..\libraries\fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->Output();
ob_end_flush(); 
?>