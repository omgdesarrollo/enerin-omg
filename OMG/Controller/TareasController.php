<?php 

session_start();
require_once '../Model/TareasModel.php';
require_once '../util/Session.php';
require_once '../Model/ArchivoUploadModel.php';

$Op=$_REQUEST["Op"];
$model=new TareasModel();
$modelArchivo=new ArchivoUploadModel();

switch ($Op) {
    case 'Listar':
        $Lista= $model->listarTareas();
        foreach ($Lista as $key => $value) {
            $url= $_REQUEST['URL'].$value['id_tarea'];
            $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls(-1,$url);
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case 'Guardar':
        header('Content-type: application/json; charset=utf-8');
        $data= json_decode($_REQUEST['tareaDatos'],true);
        $Lista= $model->insertarTarea($data['contrato'],$data['tarea'],$data['fecha_creacion'],$data['fecha_alarma'],
                                      $data['fecha_cumplimiento'],$data['observaciones'],$data['id_empleado']);
        
        foreach ($Lista as $key => $value) {
            $url= "Tareas/".$value['id_tarea'];
            $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls(-1,$url);
        }
        
        echo json_encode($Lista);
        break;
    
    case 'Eliminar':
        header('Content-type: application/json; charset=utf-8');
        $data= json_decode($_REQUEST['ID_TAREA'],true);
        $Lista= $model->eliminarTarea($data['id_tarea']);
        
        echo json_encode($Lista);
        return $Lista;
        break;

    default:
        break;
}


?>