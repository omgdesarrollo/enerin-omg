<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once '../Model/ValidacionDocumentoModel.php';
require_once '../Pojo/ValidacionDocumentoPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new ValidacionDocumentoModel();
$pojo= new ValidacionDocumentoPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarValidacionDocumentos();
    	Session::setSesion("listarValidacionDocumentos",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
        
            
        case 'Listar1':

		$Lista=$model->listarValidacionDocumentos();
    	Session::setSesion("listarValidacionDocumentos",$Lista);
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
		break;

	case 'Modificar':
		# code...
   					
//                  $pojo->setIdDocumentoEntrada($_REQUEST['ID_DOCUMENTO_ENTRADA']);
//                  $pojo->setIdCumplimiento($_REQUEST['ID_CUMPLIMIENTO']);
//                  $pojo->setFolioReferencia($_REQUEST['FOLIO_REFERENCIA']);
//                  $pojo->setFolioEntrada($_REQUEST['FOLIO_ENTRADA']);
//                  $pojo->set($_REQUEST['FECHA_RECEPCION']);
//                  $pojo->setAsunto($_REQUEST['ASUNTO']);
//                  $pojo->setRemitente($_REQUEST['REMITENTE']);
//                  $pojo->setIdEntidad($_REQUEST['ID_ENTIDAD']);
//                  $pojo->setIdClausula($_REQUEST['ID_CLAUSULA']);
//                  $pojo->setClasificacion($_REQUEST['CLASIFICACION']);
//                  $pojo->setStatusDoc($_REQUEST['STATUS_DOC']);
//                  $pojo->setFechaAsignacion($_REQUEST['FECHA_ASIGNACION']);
//                  $pojo->setFechaLimiteAtencion($_REQUEST['FECHA_LIMITE_ATENCION']);
//                  $pojo->setFechaAlarma($_REQUEST['FECHA_ALARMA']);
//                  $pojo->setDocumento($_REQUEST['DOCUMENTO']);
//                  $pojo->setObservaciones($_REQUEST['OBSERVACIONES']);
//                  
//                  
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
	
	case "AlmacenarArchivosServer":
		// echo "le ";
					 
//         $traerultimoinsertado=$model->traer_ultimo_insertado();
//         $cumplimiento=$model->listarCumplimientoPorId_Entrada($traerultimoinsertado);
//         $data = $model->getIdCumplimiento($traerultimoinsertado);
			$existe=false;
			$id_validacion=$_REQUEST["ID_VALIDACION"];
			if($_FILES["imagen"]["name"][0])
			{        
				$carpetaDestino = "../../archivos/filesValidacionDocumento/".$id_validacion;
				if(!file_exists($carpetaDestino))
				{
					mkdir($carpetaDestino,0777,true);
				}
			// echo "carpeta:  ".$carpetaDestino;
				for($i=0;$i<count($_FILES["imagen"]["name"]);$i++)
				{
					$origen = $_FILES["imagen"]["tmp_name"][$i];
					$destino = $carpetaDestino."/".$_FILES["imagen"]["name"][$i];
					move_uploaded_file($origen,$destino);
					$existe=file_exists($destino);
				}
			}
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($existe);
	break;
	default:
		# code...
		break;
}

?>


