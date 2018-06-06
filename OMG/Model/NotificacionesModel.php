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

require '../dao/NotificacionesDAO.php';


class NotificacionesModel {

    
    
    public function guardarNotificacionHibry($id_usuario_empleado,$mensaje,$tipo,$atendido,$para){
      try{
            $dao=new NotificacionesDAO();
            $rec=$dao->guardarNotificacionHibry($id_usuario_empleado, $mensaje, $tipo,$atendido,$para);
            return $rec;
        }catch (Exception $ex)
        {
            return false;
        }
    
    
    }
    
    public function mostrarNotificacionesCompletas(){
        try{
            $dao= new NotificacionesDAO();
            $rec= $dao->mostrarNotificacionesCompletas();
            return $rec;
        } catch (Exception $ex) {

        }
        
        
        
    }
    
    
    
    
    
    
}
