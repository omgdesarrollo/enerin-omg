<?php
require_once '../dao/TareasDAO.php';
require_once '../Model/NotificacionesModel.php';

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
    
    public function insertarTarea($contrato,$tarea,$fecha_creacion,$fecha_alarma,$fecha_cumplimiento,$observaciones,$id_empleado,$mensaje,
                                  $responsable_plan,$tipo_mensaje,$atendido)
    {
        try
        {
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $asunto="";
            $dao=new TareasDAO();
            $model=new NotificacionesModel();
            $exito= $dao->insertarTarea($contrato, $tarea, $fecha_creacion, $fecha_alarma, $fecha_cumplimiento,$observaciones,$id_empleado);
            $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $responsable_plan, $mensaje, $tipo_mensaje, $atendido,$asunto, $contrato);
            
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
    
    public function eliminarTarea($ID_TAREA)
    {
        try
        {
            $dao= new TareasDAO();
            $rec= $dao->eliminarTarea($ID_TAREA);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
            
}


?>