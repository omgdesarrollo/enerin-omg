<?php

session_start();
require_once '../Model/NotificacionesModel.php';
require_once '../dao/ValidacionDocumentoDAO.php';
require_once '../Model/ValidacionDocumentoModel.php';

require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new NotificacionesModel();

$modelValidacionDocumentos= new ValidacionDocumentoModel();
switch ($Op) {
	
            
        case 'enviarNotificacionDesviacionAResponsableContrato':
            echo 'entraste aqui ';
            
            $columna=$_REQUEST["columna"];
            $chekeado=$_REQUEST["checkeado"];
            $id_validacion_documento=$_REQUEST["id_validacion_documento"];
            $modelValidacionDocumentos->listarValidacionDocumentos();
//              $cadenaclausula=$_REQUEST["check"];  
//               	header('Content-type: application/json; charset=utf-8');
//                echo json_encode($data);
            
        break;    
            
            

            
	default:
		# code...
		break;
}




?>

