<?php
session_start();
require_once '../Model/InformeEvidenciasModel.php';
require_once '../dao/InformeEvidenciasDAO.php';
require_once '../util/Session.php';
require_once '../Model/ArchivoUploadModel.php';

$Op=$_REQUEST["Op"];
$model=new InformeEvidenciasModel();
$modelArchivo = new ArchivoUploadModel();

switch ($Op)
{
    case 'Listar':
        
        // $v["param"]["v"]=$_REQUEST["validado"];
        // $v["param"]["n_v"]=$_REQUEST["no_validado"];
        // $v["param"]["s_d"]=$_REQUEST["sin_documento"];
        $CONTRATO = Session::getSesion("s_cont");
        $Lista=$model->listarEvidencias($CONTRATO);
        foreach($Lista as $key => $value)
        {
            $url = $_REQUEST["URL"].$value["id_evidencias"];
            $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls($CONTRATO,$url);
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        break;
    
    case 'MostrarTemayResponsable':
        $Lista=$model->obtenerTemayResponsable($_REQUEST['ID_DOCUMENTO'], Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case'MostrarRequisitosPorDocumento':
        $Lista= $model->obtenerRequisitosporDocumento($_REQUEST['ID_DOCUMENTO'], Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case'MostrarRegistrosPorDocumento':
        $Lista= $model->obtenerRegistrosporDocumento($_REQUEST['ID_DOCUMENTO'], Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;

    default:
        break;
}


?>

