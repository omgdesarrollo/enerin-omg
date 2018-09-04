<?php
require_once '../dao/NotificacionesTareasDAO.php';
require_once '../Model/NotificacionesModel.php';

class NotificacionesTareasModel {
    //put your code here
    public function tareasEnAlarma()
    {
        try
        {
            $CONTRATO= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
//            echo "este es el contrato: ".$CONTRATO;       
            $dao=new NotificacionesTareasDAO();
            $model=new NotificacionesModel();
            
            $rec= $dao->tareasEnAlarma();
//            echo "Este es el rec: ".json_encode($rec);     
            foreach ($rec as $value) 
            {                
                $TAREA= $value['tarea'];
                $ID_EMPLEADO= $value['id_empleado'];
                
                $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
                $mensaje= "La Tarea: ".$TAREA." esta en Alarma";
                $resultado= $dao->veriricarSiYaExisteLaNotificacion($mensaje);
//                echo "este es el resultado: ".$resultado;
                if($resultado==0)
                {
                    $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$CONTRATO);
                }    
            }

            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
//    public function tareasConFechaCumplimientoProximoAVencer($CONTRATO)
//    {
//        try
//        {
//            $dao=new NotificacionesTareasDAO();
//            $rec= $dao->tareasConFechaCumplimientoProximoAVencer($CONTRATO);
//            
//            return $rec;
//        } catch (Exception $ex)
//        {
//            throw $ex;
//            return -1;
//        }
//    }
    
    
    public function tareasVencidas()
    {
        try
        {
            $CONTRATO= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
            
            $dao=new NotificacionesTareasDAO();
            $model=new NotificacionesModel();
            
            $rec= $dao->tareasVencidas();
            
            echo "este es el rec: ".json_encode($rec);
            
            foreach ($rec as $value)
            {
                $TAREA= $value['tarea'];
                $ID_EMPLEADO= $value['id_empleado'];
                $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
                $mensaje= "Tarea: ".$TAREA." con Fecha de Cumplimiento Vencido";
                
                $resultado= $dao->veriricarSiYaExisteLaNotificacion($mensaje);
                
                if($resultado==0)
                {
                    $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$CONTRATO);
                }
            }
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
}

?>
