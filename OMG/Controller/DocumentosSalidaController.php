<?php

session_start();
require_once '../Model/DocumentoSalidaModel.php';
require_once '../Model/DocumentoEntradaModel.php';
require_once '../util/Session.php';
require_once '../Model/ArchivoUploadModel.php';



$Op=$_REQUEST["Op"];
$model=new DocumentoSalidaModel();
$modelEntrada=new DocumentoEntradaModel();
$pojo= new DocumentoSalidaPojo();
$modelArchivo=new ArchivoUploadModel();

switch ($Op) {
	case 'Listar':

            $Lista=$model->listarDocumentosSalida();
            foreach ($Lista as $key => $value) {
            $url= $_REQUEST['URL'].$value['id_documento_salida'];
            $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls(-1,$url);
            }
            Session::setSesion("listarDocumentosSalida",$Lista);
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode( $Lista);
            return $Lista;
		break;	
                
        case 'listarFoliosEntrada':
            $Lista= $model->listarFoliosDeEntrada();
            header('Content-type: application/json; charset=utf-8');
            echo json_encode( $Lista);
            return $Lista;
            break;
                

//	case 'Guardar':
//           
//                  $pojo->setId_documento_entrada($_REQUEST['ID_DOCUMENTO_ENTRADA']);
//                  $pojo->setFolio_salida($_REQUEST['FOLIO_SALIDA']);
//                  $pojo->setFecha_envio($_REQUEST['FECHA_ENVIO']);
//                  $pojo->setAsunto($_REQUEST['ASUNTO']);
//                  $pojo->setDestinatario($_REQUEST['DESTINATARIO']);
//                  $pojo->setObservaciones($_REQUEST['OBSERVACIONES']);
//                  
//                           
//                  $model->insertar($pojo);            
//		break;
            
        case 'Guardar':
            header('Content-type: application/json; charset=utf-8');
            $data= json_decode($_REQUEST['documentoSalidaDatos'],true);
            
            $pojo->setId_documento_entrada($data['id_documento_entrada']);
            $pojo->setFolio_salida($data['folio_salida']);
            $pojo->setFecha_envio($data['fecha_envio']);
            $pojo->setAsunto($data['asunto']);
            $pojo->setDestinatario($data['destinatario']);
            $pojo->setObservaciones($data['observaciones']);
            
            $Lista= $model->insertar($pojo);
            echo json_encode($Lista);
            return $Lista;
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

