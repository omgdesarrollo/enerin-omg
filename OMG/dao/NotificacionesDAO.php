<?php

require_once  '../ds/AccesoDB.php';
class NotificacionesDAO {
    //put your code here
    
    
    public function guardarNotificacionHibry($id_usuario,$id_para,$mensaje,$tipo,$atendido,$asunto){
        try{
            $query="INSERT INTO notificaciones  (id_de,id_para,tipo_mensaje,mensaje,atendido,asunto)
            VALUES($id_usuario,$id_para,$tipo,'$mensaje','$atendido','$asunto')";

            // echo $query;
            $db= AccesoDB::getInstancia($query);
            $lista=$db->executeQueryUpdate($query);
            return $lista;
            
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
    }
    
    
    public function mostrarNotificacionesCompletas($ID_USUARIO){
        try{
            $query = "SELECT tbnotificaciones.id_notificaciones,tbnotificaciones.id_de, tbnotificaciones.id_para, tbnotificaciones.tipo_mensaje, tbnotificaciones.mensaje,
            tbnotificaciones.atendido, tbnotificaciones.asunto,tbnotificaciones.fecha_envio,
            
            (SELECT CONCAT(tbempleado.nombre_empleado,' ',tbempleado.apellido_paterno,' ',
                 tbempleado.apellido_materno) AS nombre 
                 FROM usuarios tbusuarios 
                 JOIN empleados tbempleado ON tbempleado.id_empleado = tbusuarios.id_empleado
                 WHERE tbusuarios.id_usuario = tbnotificaciones.id_de) AS nombre
                 
            from notificaciones tbnotificaciones
            JOIN usuarios tbusuarios ON tbusuarios.id_usuario = tbnotificaciones.id_para
            JOIN empleados tbempleados ON tbempleados.id_empleado = tbusuarios.id_empleado
            WHERE tbnotificaciones.id_para = $ID_USUARIO ORDER BY tbnotificaciones.fecha_envio DESC";

             $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function eliminarNotificacion($ID_NOTIFICACION)
    {
        try{
            $query = "DELETE FROM notificaciones WHERE id_notificaciones = $ID_NOTIFICACION";
             $db=  AccesoDB::getInstancia();
            $eliminado=$db->executeQueryUpdate($query);
            return $eliminado;
        }catch (Exception $ex)
        {
            return false;
        }
    }
    
}
