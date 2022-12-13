<?php require 'config/app.php'; ?>
<?php require 'config/database.php'; ?>
<?php
require 'fpdf/fpdf.php';
$id   = $_GET['id'];
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);
        // Movernos a la derecha
        $this->Cell(70);
        // Título
        $this->Cell(60, 10, utf8_decode('Factura electrónica'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Image('http://localhost/collegeapp/public/imgs/logoTransparente.png', 30, 65, 150);
$bill = showBill($conn);
foreach ($bill as $bl) :
    $pdf->SetFont('Times', 'B', 15);
    $pdf->Cell(0, 20, utf8_decode('CollegeApp'), 0, 1);
    $pdf->SetFont('Times', '', 12);
    $arrayFecha = explode(" ", $bl['fecha']);
    $pdf->Cell(0, 10, 'Fecha: ' .  $arrayFecha[0], 0, 1);
    $pdf->Cell(0, 10, 'Hora: ' .  $arrayFecha[1], 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Número de factura: ') . $bl['id_factura'], 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Vigilado por el Ministerio de Educación'), 0, 1);
    $pdf->SetFont('Times', 'B', 15);
    $pdf->Cell(0, 20, utf8_decode('Datos de la persona inscrita: '), 0, 1);
    $pdf->SetFont('Times', '', 12);
    
    $id = $bl['id_usuario'];
    $users = showUser($id, $conn);
    foreach ($users as $user) :
        $pdf->Cell(0, 10, utf8_decode('Nombre: ') . $user['nombre'], 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Correo: ') . $user['correo'], 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Teléfono: ') . $user['telefono'], 0, 1);
    endforeach;

    $pdf->SetFont('Times', 'B', 15);
    $pdf->Cell(0, 20, utf8_decode('Datos del curso: '), 0, 1);
    $pdf->SetFont('Times', '', 12);

    $id = $bl['id_curso'];
    $game = showGame($id, $conn);
    foreach ($game as $gm) :
        $pdf->Cell(0, 10, utf8_decode('Nombre: ' . $gm['nombre']), 0, 1);
        $pdf->MultiCell(0, 6, utf8_decode('Descripción: ' . $gm['descripcion']), 0, 1);
        $pdf->Cell(0, 12, utf8_decode('Precio: $' . $gm['precio']), 0, 1);
    endforeach;
    $pdf->Cell(0, 20, utf8_decode('¡Gracias por adquirir un curso en CollegeApp!'), 0, 1);    
    $pdf->SetFont('Arial', 'I', 12);
    $pdf->Cell(0, 20, utf8_decode('El futuro eres tú'), 0, 0, 'C');

endforeach;

$pdf->Output('', 'factura' . $bl['id_factura'] . '.pdf');
?>