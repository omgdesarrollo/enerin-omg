<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotificacionesModel
 *
 * @author usuario
 */

require '../dao/NotificacionesDao.php';


class NotificacionesModel {

    
    
    public function enviaraResponsableCumplimiento_sobre_desviacion_mayor($id_usuario_empleado,$mensaje,$tipo,$atendido,$para){
      try{
             $dao=new NotificacionesDao();
            $rec=$dao->enviaraResponsableCumplimiento_sobre_desviacion_mayor($id_usuario_empleado, $mensaje, $tipo,$atendido,$para);
           return $rec;
      
        } catch (Exception $ex) {

        }
    
    
    }
    
    public function mostrarNotificacionesCompletas(){
        try{
            $dao= new NotificacionesDao();
            $rec= $dao->mostrarNotificacionesCompletas();
            return $rec;
        } catch (Exception $ex) {

        }
        
        
        
    }
    
    
    
    
    
    
}
