<?php

require_once '../dao/GanttDao.php';
require_once '../Pojo/GanttPojo.php';
class GanttModel {
    //put your code here
    
    
    public function obtenerTareasCompletasPorFolioEntrada($folio_entrada){
        try{
            $dao= new GanttDao();
            $rec=$dao->obtenerTareasCompletasPorFolioEntrada($folio_entrada);
            
            return $rec;
            
        } catch (Exception $ex) {
            throw $e;
        }
    }
    
    public function insertarTareasGantt($data){
        foreach ($data as $value) {
            
        }
        
    }
}
