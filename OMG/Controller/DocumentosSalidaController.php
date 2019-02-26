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

switch ($Op)
{
        // lista documentos de salida con folio y sin folio
        // agrega los archivos cargados de cada registro documentos de salida
        case 'Listar':
            $CONTRATO = Session::getSesion("s_cont");
            $Lista = $model->listarDocumentosSalida($CONTRATO);
            foreach ($Lista as $key => $value)
            {
                $url = $_REQUEST['URL'].$value['id_documento_salida'];
                $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls($CONTRATO,$url);
            }
            //  Session::setSesion("listarDocumentosSalida",$Lista); 
            header('Content-type: application/json; charset=utf-8');
            echo json_encode( $Lista);
        break;
        
        // ver modelo
        case 'ListarUno':
            $CONTRATO = Session::getSesion("s_cont");
            $ID_DOCUMENTO_SALIDA = $_REQUEST["ID_DOCUMENTO_SALIDA"];
            $TABLA = $_REQUEST["TABLA"];
            $Lista = $model->listarDocumentoSalida($ID_DOCUMENTO_SALIDA,$TABLA);
            foreach ($Lista as $key => $value)
            {
                $url = $_REQUEST['URL'].$value['id_documento_salida'];
                $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls($CONTRATO,$url);
            }
            header('Content-type: application/json; charset=utf-8');
            echo json_encode( $Lista);
        break;
        
        // lista folios documentos de entrada
        case 'listarFoliosEntrada':
            $Lista= $model->listarFoliosDeEntrada();
            header('Content-type: application/json; charset=utf-8');
            echo json_encode( $Lista);
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
        
        // inserta un nuevo documento de salida con o sin folio, y regreso los datos nuevos
        case 'Guardar':
            $CONTRATO = Session::getSesion("s_cont");
            header('Content-type: application/json; charset=utf-8');
            $data= json_decode($_REQUEST['documentoSalidaDatos'],true);
            
            $pojo->setId_documento_entrada($data['id_documento_entrada']);
            $pojo->setFolio_salida($data['folio_salida']);
            $pojo->setFecha_envio($data['fecha_envio']);
            $pojo->setAsunto($data['asunto']);
            $pojo->setDestinatario($data['destinatario']);
            $pojo->setObservaciones($data['observaciones']);
            
            $Lista= $model->insertar($pojo,$CONTRATO);
            foreach ($Lista as $key => $value)
            {
                $url = $_REQUEST['URL'].$value['id_documento_salida'];
                $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls($CONTRATO,$url);
            }
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Lista);
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
    
    // elimina documento de salida ($_REQUEST['ID_DOCUMENTO_SALIDA']) con o sin folio
	case 'EliminarDocumentoSalida':
        $Lista = $model->eliminarDocumento($_REQUEST['ID_DOCUMENTO_SALIDA']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode( $Lista);
    break;
            
        // case 'EliminarSinFolio':
            
        //     $Lista= $model->eliminarDocumentoSalidaSinFolio($_REQUEST['ID_DOCUMENTO']);
        //     header('Content-type: application/json; charset=utf-8');
        //     echo json_encode( $Lista);
        //     return $Lista;
        // break;

    // lista empleados
    case'responsablesDelTema':
        $Lista= $model->responsablesDelTemaCombobox();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode( $Lista);
    break;
    
    // lista responsables de temas ligados a documento de salida con folio y sin folio
    case 'responsablesDelTemaFiltro':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista= $model->responsableDelTemaParaFiltro($CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode( $Lista);
    break;

    case 'autoridadRemitenteFiltro':
        $CONTRATO= Session::getSesion("s_cont");
        $Lista= $model->autoridadRemitenteParaFiltro($CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode( $Lista);
    break;

	default:
		# code...
    break;
}

?>

