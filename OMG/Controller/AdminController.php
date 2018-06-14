<?php


session_start();
require_once '../Model/AdminModel.php';
require_once '../Model/EmpleadoModel.php';
// require_once '../Pojo/DocumentoEntradaPojo.php';
// require_once '../Model/SeguimientoEntradaModel.php';
// require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new AdminModel();
$modelEmpleado=new EmpleadoModel();
// $pojo= new DocumentoEntradaPojo();
// $modelSeguimientoEntrada=new SeguimientoEntradaModel();
// $pojoSeguimientoEntrada= new SeguimientoEntradaPojo();



switch ($Op)
{
    
        case 'Listar':
            $Listar=$model->listarUsuarios();
            Session::setSesion("listarUsuarios",$Lista);
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Listar);
            break;
            
	case 'BusquedaEmpleado':

		$lista=$modelEmpleado->BusquedaEmpleado($_REQUEST["CADENA"]);
    	// Session::setSesion("listarDocumentosEntrada",$Lista);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
        // return $lista;
        break;
    
    default:
    return false;
    break;
}
            
