<?php

require '../ds/AccesoDB.php';
class NotificacionesDao {
    //put your code here
    
    
    public function enviaraResponsableCumplimiento_sobre_desviacion_mayor(){
        try{
            $query="inser into notificaciones(idnotificaciones,ID_USUARIO_EMPLEADO)";
            $db= AccesoDB::getInstancia($query);
            $lista=$db->executeQueryUpdate($query);
            return $lista;
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
}
