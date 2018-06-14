<?php


session_start();
require_once '../Model/AdminModel.php';
require_once '../Model/EmpleadoModel.php';
// require_once '../Pojo/DocumentoEntradaPojo.php';
// require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
<<<<<<< HEAD
$model = new AdminModel();
=======
$model=new AdminModel();
>>>>>>> a8145bb68c646ddbe290fb402acd9b7a600fe25b
$modelEmpleado=new EmpleadoModel();

// $pojo= new DocumentoEntradaPojo();
// $modelSeguimientoEntrada=new SeguimientoEntradaModel();
// $pojoSeguimientoEntrada= new SeguimientoEntradaPojo();

switch ($Op)
{
    case 'Listar':
        $lista = $model->listarUsuarios();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
    break;

	case 'BusquedaEmpleado':
		$lista=$modelEmpleado->BusquedaEmpleado($_REQUEST["CADENA"]);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
        // return $lista;
    break;

    case 'ListarPermisos':
        $lista=$model->listarUsuarioVistas($_REQUEST["ID_USUARIO"]);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
    break;
    
    default:
    return false;
    break;
}
            
