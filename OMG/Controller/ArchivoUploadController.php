<?php

session_start();
require_once '../Model/ArchivoUploadModel.php';
require_once '../Model/DocumentoEntradaModel.php';
require_once '../util/Session.php';


$Op=$_REQUEST["Op"];

$model=new ArchivoUploadModel();
$modelDocumentoEntrada= new DocumentoEntradaModel();

switch ($Op)
{
	case 'Guardar':
		$model->insertar_archivos($_REQUEST['ID_DOCUMENTO'],$urls);		
		// return $Lista;
		break;
		
	case 'listarUrls':
		$CONTRATO;
		if(isset($_REQUEST["SIN_CONTRATO"]))
		{
			$CONTRATO=-1;
		}
		else
			$CONTRATO = Session::getSesion("s_cont");
		$lista = $model->listar_urls($CONTRATO,$_REQUEST["URL"]);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
	break;
	
	case 'EliminarArchivo':
		$urlTemp = Session::getSesion("URLS");
		if(isset($_REQUEST["SIN_CONTRATO"]))
			$url = $urlTemp["fisica"].Session::getSesion("tipo")."/".$_REQUEST["URL"];
		else
		{
			$contrato = Session::getSesion("s_cont");
			$url = $urlTemp["fisica"].Session::getSesion("tipo")."/".$contrato."/".$_REQUEST["URL"];
		}

		$eliminado = $model->eliminar_archivoFisico($url);
		header('Content-type: application/json; charset=utf-8');
		echo $eliminado;
	break;

	case 'CrearUrl':
		$URL = $_REQUEST["URL"];
		if(isset($_REQUEST["SIN_CONTRATO"]))
			$url = $URL;
		else
		{
			$CONTRATO = Session::getSesion("s_cont");
//			$url = Session::getSesion("tipo")."/".$CONTRATO."/".$URL;
                        $url = $CONTRATO."/".$URL;
		}
                $url = Session::getSesion("tipo")."/".$url;
                
		$carpetaDestino = "../../archivos/".$url;
//                $carpetaDestino = "../../archivos/".Session::getSesion("tipo")."/".$url;
		$creado=true;
		if(!file_exists($carpetaDestino))
		{
			$creado = mkdir($carpetaDestino,0777,true);
		}
		if($creado)
		{
			Session::setSesion("newUrl",$url);
		}
		header('Content-type: application/json; charset=utf-8');
		echo $creado;
	break;

	case 'contadorGlobal':
		header('Content-type: application/json; charset=utf-8');
		$url = Session::getSesion("tipo");
		$urls = Session::getSesion("URLS");
		$urlIR = $urls["fisica"].$url;
		$data = array();
		$files = $model->listar_archivosGlobales($urlIR);
		$bandera = true;
		$contador = 0;
		while($bandera)
		{
			if(!strpos($files[$contador],"."))
			{
				$files = array_merge( $files,$model->listar_archivosGlobales($files[$contador]));
			}
			if(!isset($files[$contador+1]))
				$bandera = false;
			$contador++;
		}
		foreach($files as $value)
		{
			if(strpos($value,"."))
			{
				$tmp = explode("/",$value);
				array_push($data,$tmp[sizeof($tmp)-1]);
			}
		}
		$tamp_data = array();
		array_push($tamp_data,$data);
		array_push($tamp_data,$model->obtener_limite_archivos()[0]);
		echo json_encode($tamp_data);
	break;

	default:
		header('Content-type: application/json; charset=utf-8');
		echo -1;
	break;
}
?>