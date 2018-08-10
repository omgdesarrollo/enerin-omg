<?php 

session_start();
require_once '../Model/TareasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new TareasModel();


switch ($Op) {
    case 'Listar':
        $Lista= $model->listarTareas();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;
    
    case 'Guardar':
        header('Content-type: application/json; charset=utf-8');
        $data= json_decode($_REQUEST['tareaDatos'],true);
        $Lista= $model->insertarTarea($data['contrato'],$data['tarea'],$data['fecha_creacion'],$data['fecha_alarma'],
                                      $data['fecha_cumplimiento'],$data['observaciones'],$data['id_empleado']);
        echo json_encode($Lista);
        break;

    default:
        break;
}


?>