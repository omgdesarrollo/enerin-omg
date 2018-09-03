<?php
require_once '../dao/NotificacionesTareasDAO.php';

class NotificacionesTareasModel {
    //put your code here
    public function tareasEnAlarma($CONTRATO)
    {
        try
        {
            $CONTRATO= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
            
            $dao=new NotificacionesTareasDAO();
            $rec= $dao->tareasEnAlarma($CONTRATO);
            
            foreach ($rec as $key => $value) 
            {                
                $ID_EMPLEADO= $value['id_empleado'];
                $TAREA= $value['tarea'];

                $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
                $mensaje= "La siguiente tarea entro en Alarma: ".$TAREA;
                
                $model=new NotificacionesModel();
                $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$CONTRATO);
            }

            return $rec;
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
            $dao=new NotificacionesTareasDAO();
            $rec= $dao->tareasConFechaCumplimientoProximoAVencer($CONTRATO);
            
            return $rec;
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
            $dao=new NotificacionesTareasDAO();
            $rec= $dao->tareasVencidas($CONTRATO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
}

?>
