<?php 
$tipo=$_REQUEST['t'];
$urlExportar="";

if($tipo=="Excel") {
$urlExportar="exportarValidacionDocumentoView/exportarValidacionDocumentoViewExcel.php";
header("Location: $urlExportar");
}
if($tipo=="Word"){
$urlExportar="exportarValidacionDocumentoView/exportarValidacionDocumentoViewWord.php";
header("Location: $urlExportar");
}
if($tipo=="Pdf"){
    require_once '../util/dompdf/autoload.inc.php';
    session_start();
    require_once '../util/Session.php';

   
    
$Lista = Session::getSesion("listarValidacionDocumentos");
//$contenidoInfo="<table>";
//$contenidoInfo.="<tr>";
//$contenidoInfo.="<thead>";
//$contenidoInfo.="<td>Clave Documento</td>";
//$contenidoInfo.="<td>Nombre Documento</td>";
//$contenidoInfo.="<td>Responsable Documento</td>";
//$contenidoInfo.="<td>Tema Y Responsable</td>";
//$contenidoInfo.="<td>Registros</td>";
//$contenidoInfo.="<thead>";
//$contenidoInfo.="<tr>";
//$contenidoInfo.="<tr>";
$contenidoInfo="";
foreach ($Lista as $contenido){
//    $contenidoInfo.="<tr>";
    $contenidoInfo.=$contenido['clave_documento'];
    
//    $contenidoInfo.="</tr>";
}
//$contenidoInfo.="</tr>";
//$contenidoInfo.="</table></thead>";
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($contenidoInfo);
        $dompdf->setPaper('A4', 'landscape'); // (Opcional) Configurar papel y orientación
        $dompdf->render(); // Generar el PDF desde contenido HTML
        $pdf = $dompdf->output(); // Obtener el PDF generado
        $dompdf->stream(); // Enviar el PDF generado al navegador
}

?>