<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../Model/DocumentoSalidaModel.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new DocumentoSalidaModel();
$pojo= new DocumentoSalidaPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarDocumentosSalida();
    	Session::setSesion("listarDocumentosSalida",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
	
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
                  
		# code...
            
                  $pojo->setId_documento_entrada($_REQUEST['ID_DOCUMENTO_ENTRADA']);
                  $pojo->setFolio_salida($_REQUEST['FOLIO_SALIDA']);
                  $pojo->setFecha_envio($_REQUEST['FECHA_ENVIO']);
                  $pojo->setAsunto($_REQUEST['ASUNTO']);
                  $pojo->setDestinatario($_REQUEST['DESTINATARIO']);
                  $pojo->setDocumento($_REQUEST['DOCUMENTO']);
                  $pojo->setObservaciones($_REQUEST['OBSERVACIONES']);
                  
                           
                  $model->insertar($pojo);            
            
            
		break;

	case 'Modificar':
		# code...
   					
//                  $pojo->setId_documento_salida($_REQUEST['ID_DOCUMENTO_SALIDA']);
//                  $pojo->setFolio_entrada($_REQUEST['ID_DOCUMENTO_ENTRADA']);
//                  $pojo->setFolio_salida($_REQUEST['FOLIO_SALIDA']);
//                  $pojo->setFecha_envio($_REQUEST['FECHA_ENVIO']);
//                  $pojo->setAsunto($_REQUEST['ASUNTO']);
//                  $pojo->setDestinatario($_REQUEST['DESTINATARIO']);
//                  $pojo->setDocumento($_REQUEST['DOCUMENTO']);
//                  $pojo->setObservaciones($_REQUEST['OBSERVACIONES']);
//                  
//                           
//                  $model->actualizar($pojo);
                  
                  
//                  $msg=$exito['mensaje'];
//                  if($exito['Error']==0){
//                      header('Content-type: application/json; charset=utf-8');
//                      echo json_encode(array("data" => $msg));
//                  }
        $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );          
                  
	break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}

?>

