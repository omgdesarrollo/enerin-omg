<?php

require_once  '../ds/AccesoDB.php';
class NotificacionesDAO {
    //put your code here
    
    
    public function guardarNotificacionHibry($id_usuario_empleado,$mensaje,$tipo,$atendido,$para){
        try{
            $query="insert into notificaciones 
                    (id_usuario_empleado,mensaje,tipo_mensaje,atendido,para)
                    values($id_usuario_empleado,'$mensaje',$tipo,'$atendido','$para')";
            $db= AccesoDB::getInstancia($query);
            $lista=$db->executeQueryUpdate($query);
            return $lista;
            
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
    }
    
    
    public function mostrarNotificacionesCompletas(){
        try{
            $query="select idnotificaciones,id_usuario_empleado,mensaje,tipo_mensaje,atendido,para,fecha_envio 
            from notificaciones";
             $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
  
            return $lista;
    
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}
