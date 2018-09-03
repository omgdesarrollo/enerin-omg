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
        $Lista= $model->insertarTarea(
                $data['contrato'],
                $data['tarea'],
                $data['fecha_creacion'],
                $data['fecha_alarma'],
                $data['fecha_cumplimiento'],
                $data['status_tarea'],
                $data['observaciones'],
                $data['id_empleado'],
                $data['mensaje'],
                $data['reponsable_plan'],
                $data['tipo_mensaje'],
                $data['atendido']
                );
        
        foreach ($Lista as $key => $value) {
            $url= "Tareas/".$value['id_tarea'];
            $Lista[$key]["archivosUpload"] = $modelArchivo->listar_urls(-1,$url);
        }
        
        echo json_encode($Lista);
//        return $Lista;
        break;
        
    case 'enviarNotificacionWhenUpdate':
        $Lista= $model->enviarNotificacionWhenUpdate($_REQUEST['ID_EMPLEADO'],$_REQUEST['TAREA']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case 'enviarNotificacionWhenRemoveTarea':
        $Lista= $model->enviarNotificacionWhenRemoveTarea($_REQUEST['ID_EMPLEADO'],$_REQUEST['TAREA']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case 'enviarNotificacionWhenRemoveTareaAlNuevoUsuario':
        $Lista= $model->enviarNotificacionWhenRemoveTareaAlNuevoUsuario($_REQUEST['ID_EMPLEADO'],$_REQUEST['TAREA']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case 'enviarNotificacionWhenDeleteTarea':
        $Lista= $model->enviarNotificacionWhenDeleteTarea($_REQUEST['ID_EMPLEADO'],$_REQUEST['TAREA']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
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