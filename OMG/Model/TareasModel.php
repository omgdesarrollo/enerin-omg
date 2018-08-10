<?php
require_once '../dao/TareasDAO.php';

class TareasModel{
    
    public function listarTareas()
    {
        try
        {
            $dao=new TareasDAO();
            $rec= $dao->listarTareas();

            return $rec;            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function insertarTarea($contrato,$tarea,$fecha_creacion,$fecha_alarma,$fecha_cumplimiento,$observaciones,$id_empleado)
    {
        try
        {
            $dao=new TareasDAO();
            $exito= $dao->insertarTarea($contrato, $tarea, $fecha_creacion, $fecha_alarma, $fecha_cumplimiento,$observaciones,$id_empleado);
            
            if($exito[0] = 1)
            {
                $lista = $dao->listarTarea($exito['id_nuevo']);
            }
            else
                return $exito[0];
            return $lista;

        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
}


?>