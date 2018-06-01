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
    require_once '../util/lib/dompdf/dompdf_config.inc.php';
    date_default_timezone_set('America/Mexico_city'); 
//la fecha y hora de exportación sera parte del nombre del archivo Excel
   $fecha = date("d-m-Y H:i:s");

    $dompdf = new DOMPDF();
    $dompdf->load_html( file_get_contents( 'exportarValidacionDocumentoView/exportarValidacionDocumentoViewPdf.php' ) );
    $dompdf->render();
    $dompdf->stream("ReporteValidacionDocumento".$fecha.".pdf");
    
//    header("Content-type: application/vnd.ms-$tipo");
//    header("Content-Disposition: attachment; filename=Reporte_ValidacionDocumentos-$fecha.pdf");
//    header("Pragma: no-cache");
//    header("Expires: 0");  
//    $urlExportar="exportarValidacionDocumentoView/exportarValidacionDocumentoViewPdf.php";
//    header("Location: $urlExportar");
}



//echo "d  ".$tipo;

//header("$urlExportar");
?>