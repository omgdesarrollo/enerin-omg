<?php


session_start();
require_once '../Model/DocumentoEntradaModel.php';
require_once '../Pojo/DocumentoEntradaPojo.php';
require_once '../Model/SeguimientoEntradaModel.php';
require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new DocumentoEntradaModel();
$pojo= new DocumentoEntradaPojo();

$modelSeguimientoEntrada=new SeguimientoEntradaModel();
$pojoSeguimientoEntrada= new SeguimientoEntradaPojo();



switch ($Op) {
	case 'Listar':

		$Lista=$model->listarDocumentosEntrada();
    	Session::setSesion("listarDocumentosEntrada",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
//                 $traerultimoinsertado=$model->traer_ultimo_insertado();
//                       echo json_encode($traerultimoinsertado);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
            
            
        case 'mostrarcombo':
		$Lista=$model->listarDocumentosEntradaComboBox();
    	Session::setSesion("listarDocumentosEntradaComboBox",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
//		echo json_encode($Lista);
                echo json_encode($Lista);
//	$filas=array();	
//        foreach ($Lista as $filas)
//            //$sentencia="SELECT * FROM empleados";
//            //$resultado=mysql_query($sentencia);
//            //while($filas=mysql_fetch_assoc($resultado))
//              
//            {
//            echo json_encode($filas['ID_EMPLEADO']);	
//            }
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;    
            
	
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
                  
# code...
	
		$pojo->setIdCumplimiento($_REQUEST['ID_CUMPLIMIENTO']);
		$pojo->setFolioReferencia($_REQUEST['FOLIO_REFERENCIA']);
		$pojo->setFolioEntrada($_REQUEST['FOLIO_ENTRADA']);
		$pojo->setFechaRecepcion($_REQUEST['FECHA_RECEPCION']);
		$pojo->setAsunto($_REQUEST['ASUNTO']);
		$pojo->setRemitente($_REQUEST['REMITENTE']);
		$pojo->setIdEntidad($_REQUEST['ID_ENTIDAD']);
		$pojo->setIdClausula($_REQUEST['ID_CLAUSULA']);
		$pojo->setClasificacion($_REQUEST['CLASIFICACION']);
		$pojo->setStatusDoc($_REQUEST['STATUS_DOC']);
		$pojo->setFechaAsignacion($_REQUEST['FECHA_ASIGNACION']);
		$pojo->setFechaLimiteAtencion($_REQUEST['FECHA_LIMITE_ATENCION']);
		$pojo->setFechaAlarma($_REQUEST['FECHA_ALARMA']);
		$pojo->setDocumento($_REQUEST['DOCUMENTO']);
		$pojo->setObservaciones($_REQUEST['OBSERVACIONES']);
		$pojo->setMensajeAlerta($_REQUEST['MENSAJE_ALERTA']);
			
		//   if ($_REQUEST['DOCUMENTO']['type']=="text/plain"){
			//movemos el achivo al directorio destino
			// mode_uploaded_file("../../../archivos/");
			// }
		//   print_r($_REQUEST['MENSAJE_DOCUMENTO']);
		//   print_r($_FILEs['DOCUMENTO']); 
		$data = $model->insertar($pojo);
						
						// echo "e".json_encode($data[2]);
		//   echo $data[0];
		//  $jsonData['ID_CUMPLIMIENTO'] = $data[0];

		// $jsonData['ID_DOCUMENTO'] = $data[1];
		$valores = 'filesDocumento/Entrada/'.$data[0].'/'.$data[1];
		// Session::setSesion("newUrl",$valores);
		// $valores[0]=$dato[0]

		//  $jsonData['ID_DOCUMENTO'] = $data[1];
						
		//  header('Content-type: application/json; charset=utf-8');
		//   echo json_encode($jsonData);
		// return $data;
		
		$traerultimoinsertado=$model->traer_ultimo_insertado();  
	//   echo json_encode("guarda documento");
		$modelSeguimientoEntrada->insertar($traerultimoinsertado);
	
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($valores);                           
		break;

	case "AlmacenarArchivosServer":
		$destino = "filesValidacionDocumento/".$Id_validacion;
    	if($_FILES["imagen"]["name"][0])
    	{        
			$carpetaDestino = "../../archivos/".$destino;
			if(!file_exists($carpetaDestino))
            {
                mkdir($carpetaDestino,0777,true);
            }
		}
		Session::setSesion("newUrl",$destino."/");
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
		$data = $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);                  
	break;

	case 'verificacionexisteregistro':
            
		$registro=$_REQUEST["registro"];
		$cualverificar=$_REQUEST["cualverificar"];
		
		$data= $model->verificarSiExisteFolioEntrada($registro,$cualverificar);
		
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);
		
		break;

	case 'Alarmas':

		$Lista = $model->getFechaAlarma();
		Session::setSesion("Alarmas",$Lista);
		header('Content-type: application/json; charset=utf-8');
		// echo json_encode($Lista);
		break;
                            
	case 'Eliminar':
		# code...
		break;
	case 'getIdCumplimiento':
		$Id_cumplimiento="";
		$ID_DOCUMENTO = $_REQUEST['ID_DOCUMENTO'];
		$data = $model->getIdCumplimiento($ID_DOCUMENTO);
		foreach ($data as $Id_cumplimiento)
		{}
		// $valores = '/'.$value.'/'.$ID_DOCUMENTO.'/';
		// Session::setSesion("newUrl",$valores);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($Id_cumplimiento);
		break;
	default:
		# code...
		break;
}

?>


