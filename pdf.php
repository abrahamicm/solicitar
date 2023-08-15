<?php

require 'TCPDF/tcpdf.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

include_once 'server/listar.php';

// Obtener el ID de la solicitud de la URL
if (isset($_GET['solicitud_id'])) {
    $solicitud_id = $_GET['solicitud_id'];

    // Buscar la solicitud en el array de solicitudes
    $solicitud = null;
    foreach ($solicitudes as $s) {
        if ($s['id'] == $solicitud_id) {
            $solicitud = $s;
            break;
        }
    }

    if ($solicitud) {
        // Llenar el formulario con los datos de la solicitud a editar
        $nombre = $solicitud['nombre'];
        $pais = $solicitud['pais'];
        $motivo = $solicitud['motivo'];
    } else {
    }
} else {
}

// Crear una instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configurar información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Reporte de Solicitud');
$pdf->SetSubject('Reporte de Solicitud');

// Agregar una página
$pdf->AddPage();

// Contenido del PDF
$html = '<h1>Reporte de Solicitud</h1>';
$html .= '<p>ID: ' . $_GET['solicitud_id'] . '</p>';
$html .= '<p>Nombre: ' . $solicitud['nombre'] . '</p>';
$html .= '<p>País: ' . $solicitud['pais'] . '</p>';
$html .= '<p>Motivo: ' . $solicitud['motivo'] . '</p>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('reporte_solicitud.pdf', 'I');
?>
