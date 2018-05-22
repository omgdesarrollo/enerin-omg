<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GanttDao
 *
 * @author usuario
 */
require_once '../ds/AccesoDB.php';
class GanttDao {
    //put your code here
    
    
    
    public function obtenerTareasCompletasPorFolioEntrada($folio_entrada){
        try{
            
        
         $query="SElECT tbgantt_task.id,tbgantt_task.text,tbgantt_task.start_date,tbgantt_task.duration,
             tbgantt_task.progress,tbgantt_task.parent
             FROM gantt_tasks tbgantt_task"; 
           $db=  AccesoDB::getInstancia();
          $lista=$db->executeQuery($query);
          return $lista;
          } catch (Exception $ex) {
              throw $ex;
            
        }
    }
    
    
}
