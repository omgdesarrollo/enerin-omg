<?php
session_start();

require_once '../Model/CatalogoProcesosModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new CatalogoProcesosModel();

switch ($Op)
{
    case 'listar':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->listarCatalogo($CONTRATO);
        foreach($Lista as $key => $value)
        {
            foreach($value as $k=>$val)
            {
                $Lista[$key][$k] = utf8_encode($val);
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    case 'listarUno':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->listarUno($_REQUEST["ID_CONTRATO"]);
        foreach($Lista as $key => $value)
        {
            foreach($value as $k=>$val)
            {
                $Lista[$key][$k] = utf8_encode($val);
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;
    
    case 'Guardar':
        header('Content-type: application/json; charset=utf-8');
        $datos = json_decode($_REQUEST["DATOS"],true);
        foreach($datos as $key => $value)
        {
            $datos[$key] = utf8_decode($value);
        }
        $CONTRATO = Session::getSesion("s_cont");
        $exito = $model->guardarCatalogo($CONTRATO,$datos);
        echo $exito;
    break;

    case 'BuscarID':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->buscarID($_REQUEST["CADENA"],$CONTRATO);
        foreach($Lista as $key => $value)
        {
            foreach($value as $k=>$val)
            {
                $Lista[$key][$k] = utf8_encode($val);
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    case 'BuscarRegionesFiscales':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->buscarRegionesFiscales($CONTRATO);
        foreach($Lista as $key => $value)
        {
            foreach($value as $k=>$val)
            {
                $Lista[$key][$k] = utf8_encode($val);
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    case 'BuscarTagMedidor':
        $CONTRATO = Session::getSesion("s_cont");
        $CADENA = utf8_decode($_REQUEST["CADENA"]);
        $exito = $model->buscarTagMedidor($CONTRATO,$CADENA);
        echo $exito;
    break;

    case 'EliminarRegistro':
        $ID_CONTRATO = $_REQUEST["ID_CONTRATO"];
        $exito = $model->eliminarRegistro($ID_CONTRATO);
        echo $exito;
    break;

    case 'Actualizar':
        header('Content-type: application/json; charset=utf-8'); 
        $COLUMNAS = json_decode($_REQUEST["COLUMNAS_VALOR"],true);
        $ID = json_decode($_REQUEST["ID_CONTEXTO"],true);
        $REGION = utf8_decode($_REQUEST["REGION"]);
        $resultado = $model->actualizar($_REQUEST["TABLA"],$COLUMNAS,$ID,$REGION);

        // $resultado==1?$model->()

        echo json_encode($resultado);
    break;

    default:
        echo -1;
    break;
}


?>
