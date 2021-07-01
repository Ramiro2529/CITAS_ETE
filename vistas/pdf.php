<?php



require_once "../fpdf/fpdf.php";
require_once "../Controladores/plantillaControlador.php";
require_once "../Controladores/formularioControlador.php";
require_once "../Modelos/formularioModelo.php";


$usuarios=ControladorFormularios::ctrSeleccionarRegistros();



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
  
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    $this->SetFillColor(218,221,38);
    

    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(25,10,utf8_decode('Cordinación General de Estudios Técnicos Especializados'),0,0,'C');
    $this->Cell(-25,25,utf8_decode('Escuela Nacional Preparatoria'),0,0,'C');
    $this->Cell(25,45,utf8_decode('Comprobante de cita para tramite presencial'),0,0,'C');
    $this->Image('../img/ENP.png',15,10,22,22,'png');
    $this->Image('../img/logoETE_c.png',170,12,20,20,'png');
    // Salto de línea
    $this->Ln(40);

    $this->Cell(18,10,'Folio de cita',1,0,'C',0);
    $this->Cell(32,10,'Tramite',1,0,'C',0);
    $this->Cell(24,10,'N. cuenta',1,0,'C',0);
    $this->Cell(81,10,'Nombre del alumno',1,0,'C',0);
    
    $this->Cell(20,10,'Fecha de cita',1,0,'C',0);
    $this->Cell(20,10,'Hora de cita',1,1,'C',0);
}

// Pie de página
function Footer()
{

    

    $fechaEmision=date("Y/m/d");
    $this->Cell(0,150,utf8_decode("Emitido el ".$fechaEmision),0,0,'C');
    $this->Ln(10);
    $this->Cell(0,150,utf8_decode("Coordinación General de Estudios Técnicos Especializados"),0,0,'C');
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo(),0,0,'C');
}
}




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);


foreach($usuarios as $key =>$value){

    $pdf->Cell(18,10,utf8_decode($value['id']),1,0,'C',0);
    $pdf->Cell(32,10,utf8_decode($value['tramite']),1,0,'C',0);
    $pdf->Cell(24,10,$value['numero_cuenta'],1,0,'C',0);
    $pdf->Cell(29,10,utf8_decode($value['nombre_alumno']),1,0,'C',0);
    $pdf->Cell(26,10,utf8_decode($value['apellido_paterno_alumno']),1,0,'C',0);
    $pdf->Cell(26,10,utf8_decode($value['apellido_materno_alumno']),1,0,'C',0);
    $pdf->Cell(20,10,$value['fecha_cita'],1,0,'C',0);
    $pdf->Cell(20,10,$value['hora_cita'],1,1,'C',0);


}





$pdf->Output('I', 'Comprobante_cita.pdf');
?>