<?php

session_start();
require_once '../Model/ArchivoUploadModel.php';
require_once '../Model/DocumentoEntradaModel.php';
require_once '../util/Session.php';

$urls = Session::getSesion("archivos_urls");
$total = Session::getSesion("archivos_urls_contador");
$Op=$_REQUEST["Op"];

$model=new ArchivoUploadModel();
$modelDocumentoEntrada= new DocumentoEntradaModel();

switch ($Op) {
	case 'Guardar':
		// echo $urls;
		// foreach($urls as $url)
		// {
		// 	echo $url;
		// }
		echo "total de registros: ".$total;
		$model->insertar_archivos($_REQUEST['ID_DOCUMENTO'],$urls);
		// $newArray = array();
		Session::setSesion("archivos_urls",null);
		
		// header('Content-type: application/json; charset=utf-8');
		// echo json_encode( $Lista);
		
		// return $Lista;
		break;
		
	case 'listarUrls':
		$todo = array();
		$id_documento = $_REQUEST['ID_DOCUMENTO'];
		$lista = $model->obtener_urls($id_documento);
		$data = $modelDocumentoEntrada->getIdCumplimiento($id_documento);
		$todo[0] = $lista;
		$todo[1] = $data;
		// Session::setSesion("newUrl",'/'.$id_cumplimiento.'/'.$id_documento.'/');
		// Session::setSesion("getUrlsArchivos",$lista);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($todo);
		break;
	
	case 'eliminarArchivo':
		$data = $model->eliminar_archivo($_REQUEST['ID_DOCUMENTO'],$_REQUEST['ARCHIVO_NAME']);
		$data = $model->eliminar_archivoFisico($_REQUEST['ID_DOCUMENTO'],$_REQUEST['ARCHIVO_NAME'],$data);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);
		break;
	
	default: break;
}
?>