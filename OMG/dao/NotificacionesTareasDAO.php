<?php

require_once '../ds/AccesoDB.php';
class NotificacionesTareasDAO
{
//    public function tareasConFechaCumplimientoProximoAVencer($CONTRATO)
//    {
//        try
//        {
//            $query="SELECT tbtareas.tarea
//                    FROM tareas tbtareas
//                    WHERE tbtareas.fecha_cumplimiento > CURDATE() AND tbtareas.fecha_cumplimiento <= DATE_ADD(CURDATE(), INTERVAL 3 DAY) 
//                    AND tbtareas.status_tarea=1 AND tbtareas.contrato=$CONTRATO";
//            
//            $db=  AccesoDB::getInstancia();
//            $lista=$db->executeQuery($query);
//
//            return $lista;            
//        } catch (Exception $ex)
//        {
//            throw $ex;
//            return -1;
//        }
//    }
    
    // lista las tareas que en fecha cumplimiento sean menor o igual de la fecha actual y el estatu de la tarea sea 1 (tiempo vencido)
    public function tareasVencidas()
    {
        try
        {
            $query="SELECT tbtareas.id_tarea, tbtareas.tarea, tbtareas.id_empleado
                    FROM tareas tbtareas
                    WHERE tbtareas.fecha_cumplimiento <= CURDATE() AND tbtareas.status_tarea = 1";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    // obtiene el identificador de usuario de acuerdo al identificador de empleado ($ID_EMPLEADO)
    public function obtenerUsuarioPorIdEmpleado($ID_EMPLEADO)
    {
        try
        {
            $query="SELECT tbusuarios.id_usuario
                    FROM usuarios tbusuarios
                    WHERE tbusuarios.id_empleado=$ID_EMPLEADO";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista[0]['id_usuario'];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
    // lista la existencia de notificaciones buscado por $MENSAJE
    public function veriricarSiYaExisteLaNotificacion($MENSAJE)
    {
        try
        {
            $query="SELECT COUNT(*) AS resultado
                    FROM notificaciones tbnotificaciones
                    WHERE tbnotificaciones.mensaje = '$MENSAJE'";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista[0]['resultado'];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
}
?>