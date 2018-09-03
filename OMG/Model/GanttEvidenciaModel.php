<?php

require_once '../dao/GanttEvidenciasDao.php';
//require_once '../Pojo/GanttPojo.php';
class GanttEvidenciaModel {
    //put your code here
    
    
    public function obtenerT($v){
        try{
            $dao= new GanttEvidenciasDao();
            $rec=$dao->obtenerT($v);
            
            return $rec;
            
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
    }
    public function verificarsitienedescendencia($v){
        try{
            $dao=new GanttEvidenciasDao();
            $rec=$dao->verificarsitienedescendencia($v);
            return $rec;
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
    }
    public function insertarTareasGantt($data,$id_evidencia){
       
        try{
//            $inserccion;
            $lista_tareas_verificadas;
            $dao= new GanttEvidenciasDao();
            $modelGantt= new GanttEvidenciaModel();
            $lista_tareas_verificadas=self::verificarTareasExiste($data);
//            echo "existen ".json_encode($lista_tareas_verificadas);
//            echo "d  :".$id_evidencia."  -fff";
//            echo "tareas verificadas : ".json_encode($lista_tareas_verificadas);
            foreach ($data as $value) {
                if (isset($value["id"])) {
                   foreach ($lista_tareas_verificadas as $value2) {
                        if($value["id"]==$value2["id"]){
                            
                                if($value2["cantidad"]==0){
                                    if(isset($value["parent"])!=""){
                                        echo "entro en parent";
                                         $value["progress"]=0;
                                         $value["id_empleado"]=$value["user"];
                                         $value["id_evidencia"]=$id_evidencia;
                                         $dao->insertarTareasGantt($value);
//                                         $dao->insertarTareasConFolioEntrada_de_seguimiento_entrada($value);
                                    }
                                }
                                else{
                                    
                                     if($value["!nativeeditor_status"]=='deleted'){
                                         echo "entro a eliminar la tarea";
                                         $dao->deleteTareas($value);
//                                         $dao->deleteTareasDe_Gantt_Seguimiento_Entrada($value);
                                            
                                    }else{
                                         $dao->updateTareas($value); 
//                                         $dao->updateTareasId_EmpleadoXIdGantt_En_Tabla_Seguimiento_entrada($value);
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
            $dao= new GanttEvidenciasDao();
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
    
    
    public function deleteTareaajax($value)
    {
        try{
            $dao= new GanttEvidenciasDao();
            $dao->deleteTareasAjax($value);
            
        } catch (Exception $ex) {

        }
    }
    
    public  function calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada)
    {
        try
        {
            $dao=new GanttDao();
             $rec= $dao->calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada);
             echo "s  : ".$rec[0]["total_avance_programa"];
             $value["id_seguimiento"]=$id_seguimiento_que_lleva_al_folio_de_entrada;
             $value["avance_programa"]=$rec[0]["total_avance_programa"];
            $dao->updateAvanceProgramaGeneral($value);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function updateAvanceProgramaGeneral($value)
    {
        try{
            
            $dao= new GanttDao();
//            $dao= 
            
            
        } catch (Exception $ex) {
            throw  $ex;
        }
    }
    
    
    public function obtenerValidacionSupervisorEvidencias($v)
    {
        try
        {
            $dao=new GanttEvidenciasDao();
            $rec= $dao->obtenerValidacionSupervisorEvidencias($v);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function listarEmpleadosNombreCompleto()
    {
       try
       {
           $dao=new GanttEvidenciasDao();
           $rec= $dao->listarEmpleadosNombreCompleto();
           
           return $rec;
       } catch (Exception $ex)
       {
           throw $ex;
           return -1;
       }
    }
}
