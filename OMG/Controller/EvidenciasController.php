<?php

session_start();
require_once '../Model/EvidenciasModel.php';
require_once '../Pojo/EvidenciasPojo.php';
require_once '../Model/DocumentoModel.php';
require_once '../util/Session.php';
require_once '../Model/AdminModel.php';

$Op = $_REQUEST["Op"];
$model = new EvidenciasModel();
$modelAdmin =new AdminModel();
$pojo = new EvidenciasPojo();

$modelDocumento=new DocumentoModel();


switch ($Op)
{
    case 'Listar':
        $USUARIO = Session::getSesion("user");
        $CONTRATO = Session::getSesion("s_cont");
		$Lista=$model->listarEvidencias($USUARIO["ID_USUARIO"],$CONTRATO);
    	Session::setSesion("listarOperaciones",$Lista);//no se de que es esto JR
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
		break;
    
    case 'getClavesDocumentos':
        $Lista=$model->getClavesDocumentos($_REQUEST["CADENA"]);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
		break;
            
    case 'MostrarRegistrosPorDocumento':
        
        $id_documento=$_REQUEST["ID_DOCUMENTO"];
        $lista=$modelDocumento->obtenerRegistrosPorDocumento($id_documento);
        Session::setSesion("obtenerRegistrosPorDocumento",$lista);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
        
        break;
    case 'CrearEvidencia':
        $usuario = Session::getSesion("user");
        $res = $model->crearEvidencia($usuario["ID_USUARIO"],$_REQUEST["ID_REGISTRO"]);
        echo $res;
        break;
    
    case 'iniciarEnVacio':
        $res = $model->iniciarEnVacio($_REQUEST["ID_EVIDENCIAS"]);
        echo $res;
        break;
    
    case 'ModificarColumna':

		$data = $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
		// header('Content-type: application/json; charset=utf-8');
		echo $data;
	break;
    
    case 'ListarEvidencia':
    $USUARIO = Session::getSesion("user");
    $resultado = $model->listarEvidencia($_REQUEST['ID_EVIDENCIA'],$USUARIO["ID_USUARIO"]);
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($resultado);
    break;


    case 'EliminarEvidencia':
        
        $data = $model->eliminarEvidencia($_REQUEST['ID_EVIDENCIA']);
        echo $data;
    break;

    case 'BuscarTema':
        $USUARIO = Session::getSesion("user");
        $lista = $model->listarTemas($_REQUEST['CADENA'],$USUARIO["ID_USUARIO"], Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
    break;

    case 'BuscarRegistro':
        $lista = $model->listarRegistros($_REQUEST['CADENA'],$_REQUEST['ID_TEMA']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
    break;

    case 'MandarAccionCorrectiva':
        $exito = $model->mandarAccionCorrectiva($_REQUEST["ID_EVIDENCIA"],$_REQUEST["MENSAJE"],$_REQUEST["COLUMNA"]);
        echo $exito;
    break;

	default:
		echo false;
        break;
}


?>
