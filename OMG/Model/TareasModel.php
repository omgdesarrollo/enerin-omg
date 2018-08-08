<?php
require_once '../dao/TareasDAO.php';

class TareasModel{
    
    public function listarTareas()
    {
        try
        {
            $dao=new TareasDAO();
            $lista= $dao->listarTareas();        
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function insertarTarea($contrato,$tarea,$fecha_creacion,$fecha_alarma,$fecha_cumplimiento,$observaciones,$archivo_adjunto,$id_empleado)
    {
        try
        {
            $dao=new TareasDAO();
            $rec= $dao->insertarTarea($contrato, $tarea, $fecha_creacion, $fecha_alarma, $fecha_cumplimiento, $observaciones, $archivo_adjunto,$id_empleado);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
}


?>