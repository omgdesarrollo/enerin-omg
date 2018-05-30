<?php

require '../ds/AccesoDB.php';
class NotificacionesDao {
    //put your code here
    
    
    public function enviaraResponsableCumplimiento_sobre_desviacion_mayor(){
        try{
            $query="insert into notificaciones 
                    (id_usuario_empleado,mensaje,tipo_mensaje,atendido)
                    values(0,'tiene que atender la desviacion',1,'false')";
            $db= AccesoDB::getInstancia($query);
            $lista=$db->executeQueryUpdate($query);
            return $lista;
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
}
