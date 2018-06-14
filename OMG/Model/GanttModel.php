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
//        echo "   entro";
        try{
            $inserccion;
            $lista_tareas_verificadas;
            $dao= new GanttDao();
            $lista_tareas_verificadas=self::verificarTareasExiste($data);
            foreach ($data as $value) {
                if (isset($value["id"])) {
                    foreach ($lista_tareas_verificadas as $value2) {
                        if($value["id"]==$value2["id"]){
                            
                                if($value2["cantidad"]==0){
                                    if($value["parent"]!=""){
                                         $value["progress"]=0;
                                         $dao->insertarTareasGantt($value);
                                    }
                                }
                                else{
//                                    echo "que tiene  ".$value["!nativeeditor_status"];
                                     if($value["!nativeeditor_status"]=='deleted'){
//                                            echo "entro en eliminar  ".$value["id"];
                                         $dao->deleteTareas($value);
                                            
                                    }else{
                                         $dao->updateTareas($value); 
//                                         echo "entro actualizar";
                                    }
                            }
                        }
                    }
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
    
    public static function verificarTareasExiste($array){
        try{
            $dao= new GanttDao();
            $numeroenlistaposicion=0;
            $lista_tarea_verificada_si_existe;
            foreach ($array as $value) {
                if (isset($value["id"])) {
                    $lista_tarea_verificada_si_existe[$numeroenlistaposicion]["id"]= $value["id"];
                    $lista_tarea_verificada_si_existe[$numeroenlistaposicion]["cantidad"]=$dao->verificarTareaExiste($value)[0]["cantidad"];
                    $numeroenlistaposicion++;
                }
            }
            return $lista_tarea_verificada_si_existe;
        } catch (Exception $ex) {
            throw  $ex;
        }
    }
    
    
    public function obtenerFolioEntradaSeguimiento($ID_SEGUIMIENTO)
    {
        try
        {
            $dao=new GanttDao();
            $rec= $dao->obtenerFolioEntradaSeguimiento($ID_SEGUIMIENTO);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}
