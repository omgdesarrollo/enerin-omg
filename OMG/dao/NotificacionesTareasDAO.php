<?php
require_once '../ds/AccesoDB.php';

class NotificacionesTareasDAO{
    
    public function tareasEnAlarma($CONTRATO)
    {
        try
        {
            $query="SELECT tbtareas.tarea
                    FROM tareas tbtareas
                    WHERE tbtareas.fecha_alarma=CURDATE() AND tbtareas.status_tarea=1 AND tbtareas.contrato=$CONTRATO";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    
    public function tareasConFechaCumplimientoProximoAVencer($CONTRATO)
    {
        try
        {
            $query="SELECT tbtareas.tarea
                    FROM tareas tbtareas
                    WHERE tbtareas.fecha_cumplimiento > CURDATE() AND tbtareas.fecha_cumplimiento <= DATE_ADD(CURDATE(), INTERVAL 3 DAY) 
                    AND tbtareas.status_tarea=1 AND tbtareas.contrato=$CONTRATO";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function tareasVencidas($CONTRATO)
    {
        try
        {
            $query="SELECT tbtareas.id_tarea,tbtareas.tarea
                    FROM tareas tbtareas
                    WHERE tbtareas.fecha_cumplimiento <= CURDATE() AND tbtareas.status_tarea = 1 AND tbtareas.contrato = $CONTRATO";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function obtenerUsuarioPorIdEmpleado($ID_EMPLEADO)
    {
        try
        {
            $query="SELECT tbusuarios.id_usuario
                    FROM usuarios tbusuarios
                    WHERE tbusuarios.id_empleado=$ID_EMPLEADO";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
//            echo "este es el query id_usuario: ".json_encode($query);
            return $lista[0]['id_usuario'];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
}

?>