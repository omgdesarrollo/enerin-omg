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
>>>>>>> 968b3afad18139ac11caa86377f8584931e1d2a8
$modelEmpleado=new EmpleadoModel();

// $pojo= new DocumentoEntradaPojo();
// $modelSeguimientoEntrada=new SeguimientoEntradaModel();
// $pojoSeguimientoEntrada= new SeguimientoEntradaPojo();

switch ($Op)
{
<<<<<<< HEAD
    case 'Listar':
        $lista = $model->listarUsuarios();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
    break;

=======
    
        case 'Listar':
            $Listar=$model->listarUsuarios();
            Session::setSesion("listarUsuarios",$Lista);
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Listar);
            break;
            
>>>>>>> 968b3afad18139ac11caa86377f8584931e1d2a8
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
            
