<?php
include("conexion.php");
require("fpdf/fpdf.php");

$id = $_GET['id'];
$datos = $conexion->query("SELECT * FROM registro_discapacidad WHERE id=$id")->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",14);
$pdf->Cell(0,10,"Registro de Persona con Discapacidad",0,1,"C");

$pdf->Image("fotos/".$datos['foto'],80,25,45);
$pdf->Ln(60);

$pdf->SetFont("Arial","",11);

foreach($datos as $campo=>$valor){
    if($campo!="foto"){
        $pdf->MultiCell(0,8, strtoupper($campo).": ".$valor);
    }
}

$pdf->Output();
?>
