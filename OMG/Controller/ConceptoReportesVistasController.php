<?php
session_start();
require_once '../util/Session.php';
require_once '../Model/SeleccionConceptoReporteModel.php';
$Op=$_REQUEST["Op"];

$modelConceptoReporteVistas= new SeleccionConceptoReporteModel();
switch ($Op)
{
    case "detectarVista":
       $lista=$modelConceptoReporteVistas->evaluarVista($_REQUEST["idConcepto"]); 
       header('Content-type: application/json; charset=utf-8');
       echo json_encode($lista);
    break;

    default:
        echo -1;
    break;
}


?>
