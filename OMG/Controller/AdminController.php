<?php


session_start();
require_once '../Model/AdminModel.php';
require_once '../Model/EmpleadoModel.php';
// require_once '../Pojo/DocumentoEntradaPojo.php';
// require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model = new AdminModel();
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
    
    case 'AgregarUsuario':
        $result = $model->InsertarUsuario($_REQUEST["ID_EMPLEADO"],$_REQUEST["NOMBRE_USUARIO"]);
        header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
    break;

    case 'ListarUsuario':
        $lista = $model->listarUsuario($_REQUEST["ID_EMPLEADO"]);
        
        // header('Content-type: application/json; charset=utf-8');
		// echo json_encode($lista);
    break;

    case 'CrearTablaPermisos':
        $lista = $model->listarSubmodulos();
        foreach($lista as $key=>$datos)
        {
            echo "$key";
            // foreach($datos as $val)
            // {
            //     // echo "\n";
            //     header('Content-type: application/json; charset=utf-8');
            //     echo json_encode($val);        
            // }
            // echo $key."\n";
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($datos);
            echo "\n";
        }
    break;

    default:
    return false;
    break;
}
            
