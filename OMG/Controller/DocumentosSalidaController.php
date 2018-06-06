<?php

session_start();
require_once '../Model/DocumentoSalidaModel.php';
require_once '../Model/DocumentoEntradaModel.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new DocumentoSalidaModel();
$modelEntrada=new DocumentoEntradaModel();
$pojo= new DocumentoSalidaPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarDocumentosSalida();
    	Session::setSesion("listarDocumentosSalida",$Lista);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);

		return $Lista;
		break;	

	case 'Guardar':
           
                  $pojo->setId_documento_entrada($_REQUEST['ID_DOCUMENTO_ENTRADA']);
                  $pojo->setFolio_salida($_REQUEST['FOLIO_SALIDA']);
                  $pojo->setFecha_envio($_REQUEST['FECHA_ENVIO']);
                  $pojo->setAsunto($_REQUEST['ASUNTO']);
                  $pojo->setDestinatario($_REQUEST['DESTINATARIO']);
                  $pojo->setObservaciones($_REQUEST['OBSERVACIONES']);
                  
                           
                  $model->insertar($pojo);            
            
            
		break;

	case 'Modificar':
   					
        $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );          
                  
	break;
    
    
                    
        case 'loadAutoComplete':
            
              $cadenafolioentrada=$_REQUEST["FOLIOENTRADA"];  
              $data= $modelEntrada->loadAutoComplete($cadenafolioentrada);
               	header('Content-type: application/json; charset=utf-8');
                echo json_encode($data);
            
        break;
    
    
    

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}

?>

