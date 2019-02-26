<?php

session_start();
require_once '../Model/InformeValidacionDocumentosModel.php';
require_once '../dao/InformeValidacionDocumentosDAO.php';
require_once '../Model/ArchivoUploadModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new InformeValidacionDocumentosModel();
$modelArchivo = new ArchivoUploadModel();

switch ($Op)
{
    // lista documentos con sus temas y responsables de tema, requisitos, ligados
    case 'listarparametros(v,nv,sd)':
        $CONTRATO = Session::getSesion("s_cont");
        $v["param"]["contrato"]= Session::getSesion("s_cont");
        $Lista= $model->listarValidaciones($v);
        foreach($Lista["info"] as $key => $value)
        {
            $url = $_REQUEST["URL"].$value["id_validacion_documento"];
            $Lista["info"][$key]["archivosUpload"] = $modelArchivo->listar_urls($CONTRATO,$url);
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;
    
    // pendiente de verificar su uso
    case 'obtenerResponsablesDocumentos':
        $Lista=$model->obtenerTodosLosEmpleadosQueSonResponsableDelDocumento();
        header("Content-type:application/json;charset=utf-8");
        echo json_encode($Lista);
    break;
    
    // lista temas y responsables de temas ligados a un documento
    case 'MostrarTemayResponsable':
        $Lista=$model->obtenerTemayResponsable($_REQUEST['ID_DOCUMENTO']);
//      Session::setSesion("obtenerTemayResponsable", $lista);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    // listar requisitos por documento
    case 'MostrarRequisitosPorDocumento':
        $Lista= $model->obtenerRequisitosporDocumento($_REQUEST['ID_DOCUMENTO']);
//      Session::setSesion("obtenerRequisitosporDocumento",$Lista);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode( $Lista);
    break;

    // pendiente de verificar su uso
    case 'MostrarRegistrosPorDocumento':
        $Lista= $model->obtenerRegistrosPorDocumento($_REQUEST['ID_DOCUMENTO']);
//      Session::setSesion("obtenerRegistrosPorDocumento",$Lista);   
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;
    
    default:
        break;
}

?>