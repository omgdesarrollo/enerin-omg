<?php

session_start();
require_once '../Model/ArchivoUploadModel.php';
require_once '../Model/DocumentoEntradaModel.php';
require_once '../util/Session.php';


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
		// $urls = Session::getSesion("archivos_urls");
		// $total = Session::getSesion("archivos_urls_contador");
		// echo "total de registros: ".$total;
		$model->insertar_archivos($_REQUEST['ID_DOCUMENTO'],$urls);
		// $newArray = array();
		// Session::setSesion("archivos_urls",null);
		
		// header('Content-type: application/json; charset=utf-8');
		// echo json_encode( $Lista);
		
		// return $Lista;
		break;
		
	case 'listarUrls':
		$url = $_REQUEST['URL'];
		$urls = Session::getSesion("URLS");
		$files = scandir($urls["fisica"].$url);//Se forma la url fisica
		$archivosNames = array();
		foreach($files as $index=>$value)
		{
			if($index>=2)
			{
				$archivosNames[$index-2] = $value;
			}
		}
		$todo[0] = $archivosNames;
		$todo[1] = $urls["logica"].$url;
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($todo);
		break;
	
	case 'EliminarArchivo':
		// $data = $model->eliminar_archivo($_REQUEST['ID_DOCUMENTO'],$_REQUEST['ARCHIVO_NAME']);
		$urlTemp = Session::getSesion("URLS");
		$url = $urlTemp["fisica"].$_REQUEST["URL"];
		$eliminado = $model->eliminar_archivoFisico($url);
		header('Content-type: application/json; charset=utf-8');
		echo $eliminado;
		break;

	case 'CrearUrl':
		$url = $_REQUEST["URL"];
		$carpetaDestino = "../../archivos/".$url;
		$creado=true;
		if(!file_exists($carpetaDestino))
		{
			$creado = mkdir($carpetaDestino,0777,true);
		}
		Session::setSesion("newUrl",$url);
		header('Content-type: application/json; charset=utf-8');
		echo $creado;
		break;
	
	default:
		header('Content-type: application/json; charset=utf-8');
		echo false;
	break;
}
?>