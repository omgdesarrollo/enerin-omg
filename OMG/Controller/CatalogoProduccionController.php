<?php
session_start();

require_once '../Model/CatalogoProduccionModel.php';
// require_once '../Model/socketModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model = new CatalogoProduccionModel();
// $modelSocket = new socketModel();

// error_reporting(E_ALL);
// set_time_limit(0);
// ob_implicit_flush();

switch ($Op)
{
    // lista registros
    case 'listar':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->listarCatalogo($CONTRATO);
        // $val = 0/0;
        // var $a;
        // socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        // sleep(2);
        // foreach($Lista as $key => $value)
        // {
        //     foreach($value as $k=>$val)
        //     {
        //         $Lista[$key][$k] = utf8_encode($val);
        //     }
        // }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    // lista un registro de acuerdo al identificador de catalogo produccion ($_REQUEST["ID_CONTRATO"])
    case 'listarUno':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->listarUno($_REQUEST["ID_CONTRATO"]);
        // foreach($Lista as $key => $value)
        // {
        //     foreach($value as $k=>$val)
        //     {
        //         $Lista[$key][$k] = utf8_encode($val);
        //     }
        // }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;
    
    // guarda un nuevo registro
    case 'Guardar':
        header('Content-type: application/json; charset=utf-8');
        $datos = json_decode($_REQUEST["DATOS"],true);
        // foreach($datos as $key => $value)
        // {
        //     $datos[$key] = utf8_decode($value);
        // }
        $CONTRATO = Session::getSesion("s_cont");
        $exito = $model->guardarCatalogo($CONTRATO,$datos);
        echo $exito;
    break;

    // lista registros asignaciones contrato de la busqueda ($_REQUEST["CADENA"])
    case 'BuscarID':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->buscarID($_REQUEST["CADENA"],$CONTRATO);
        // foreach($Lista as $key => $value)
        // {
        //     foreach($value as $k=>$val)
        //     {
        //         $Lista[$key][$k] = utf8_encode($val);
        //     }
        // }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    // lista registros regiones fiscales
    case 'BuscarRegionesFiscales':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->buscarRegionesFiscales($CONTRATO);
        // foreach($Lista as $key => $value)
        // {
        //     foreach($value as $k=>$val)
        //     {
        //         $Lista[$key][$k] = utf8_encode($val);
        //     }
        // }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    // realiza una busqueda ($_REQUEST["CADENA"]) sobre el tag medidor
    case 'BuscarTagMedidor':
        $CONTRATO = Session::getSesion("s_cont");
        $CADENA = $_REQUEST["CADENA"];
        $exito = $model->buscarTagMedidor($CONTRATO,$CADENA);
        echo $exito;
    break;

    // elimina un registro de catalogo produccion
    case 'EliminarRegistro':
        $ID_CONTRATO = $_REQUEST["ID_CONTRATO"];
        $exito = $model->eliminarRegistro($ID_CONTRATO);
        echo $exito;
    break;

    // 
    case 'Actualizar':
        header('Content-type: application/json; charset=utf-8'); 
        $COLUMNAS = json_decode($_REQUEST["COLUMNAS_VALOR"],true);
        $ID = json_decode($_REQUEST["ID_CONTEXTO"],true);
        // $REGION = $_REQUEST["REGION"];
        $resultado = $model->actualizar($COLUMNAS,$ID);

        // $resultado==1?$model->()

        echo json_encode($resultado);
    break;

    case 'ListarConceptos':
        header('Content-type: application/json; charset=utf-8'); 
        echo json_encode($model->obtenerConceptos(Session::getSesion("s_cont")));
    break;

    default:
        echo -1;
    break;
}


?>
