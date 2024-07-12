<?php
require 'app.php';

define('EURO', chr(128));
define('TIL', chr(227));

$valor = $_POST['valor-acumulado'];

$text = "Valor acumulado no seu cart".TIL."o: ".$valor.EURO;
$width = 90;
$height = 29;

try {
    $pdf = new FPDF('L','mm',array($width, $height));
    // $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell($width-10, $height-20, $text, 0, 1, 'C');
    $id = uniqid();
    $filepath = 'public/' . $id . '.pdf';
    $pdf->Output('F', $filepath);

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $url = $protocol . '://' . $host . '/public/' . basename($filepath);

    $response['code'] = 200;
    $response['pdfurl'] = $url;
    exit(json_encode($response));
} catch (Exception $e) {
    $response['code'] = 406;
    $response['message'] = "Erro ao gerar o PDF...";
    exit(json_encode($response));
}
?>